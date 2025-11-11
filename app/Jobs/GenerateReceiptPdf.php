<?php

namespace App\Jobs;

use App\Models\Shipment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Picqer\Barcode\BarcodeGeneratorPNG;

class GenerateReceiptPdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $shipmentId;

    public function __construct($shipmentId)
    {
        $this->shipmentId = $shipmentId;
    }

    public function handle()
    {
        $shipment = Shipment::find($this->shipmentId);

        if (!$shipment) {
            Log::error('Shipment not found for ID: ' . $this->shipmentId);
            return;
        }

        $receiptsPath = storage_path('app/public/receipts');
        if (!File::exists($receiptsPath)) {
            File::makeDirectory($receiptsPath, 0755, true);
        }

        // Generate barcode locally
        $barcodePath = null;
        if ($shipment->tracking_id) {
            $generator = new BarcodeGeneratorPNG();
            $barcodePath = 'barcodes/' . $shipment->tracking_id . '.png';
            $barcodeContent = $generator->getBarcode($shipment->tracking_id, $generator::TYPE_CODE_128);
            Storage::put('public/' . $barcodePath, $barcodeContent);
        }

        try {
            $pdf = Pdf::loadView('receipt', compact('shipment', 'barcodePath'))
                ->setOption(['isRemoteEnabled' => true]);
            $pdf->save(storage_path('app/public/receipts/' . $shipment->tracking_id . '.pdf'));
            Log::info('PDF generated successfully for tracking ID: ' . $shipment->tracking_id);
        } catch (\Exception $e) {
            Log::error('Failed to generate PDF for tracking ID ' . $shipment->tracking_id . ': ' . $e->getMessage());
        }
    }
}