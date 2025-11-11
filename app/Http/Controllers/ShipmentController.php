<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ShipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['track', 'viewReceipt', 'downloadReceipt']);
    }

    public function index()
    {
        $totalShipments = Shipment::count();
        $pendingShipments = Shipment::where('status', 'Pending')->count();
        return view('admin.dashboard', compact('totalShipments', 'pendingShipments'));
    }

    public function create()
    {
        return view('admin.create-shipment');
    }

    public function store(Request $request)
    {
        Validator::extend('email_or_encrypted', function ($attribute, $value, $parameters, $validator) {
            if (empty($value)) {
                return true;
            }
            if (strtoupper($value) === 'ENCRYPTED') {
                return true;
            }
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        });

        $request->validate([
            'sender_name' => 'required',
            'sender_address' => 'required',
            'sender_phone' => 'required',
            'sender_email' => 'nullable|email_or_encrypted',
            'receiver_name' => 'required',
            'receiver_address' => 'required',
            'receiver_phone' => 'required',
            'receiver_email' => 'nullable|email_or_encrypted',
            'package_name' => 'required',
            'carrier' => 'required',
            'carrier_reference_no' => 'required',
            'status' => 'required',
            'weight' => 'required',
            'departure_date' => 'required|date',
            'expected_delivery_date' => 'required|date',
            'destination' => 'required',
            'delivery_time' => 'required',
            'image' => 'image|nullable',
            'origin' => 'required',
        ], [
            'sender_email.email_or_encrypted' => 'The sender email must be a valid email address or "ENCRYPTED".',
            'receiver_email.email_or_encrypted' => 'The receiver email must be a valid email address or "ENCRYPTED".',
        ]);

        $trackingId = 'SHIPEX-' . Str::random(8);

        $shipment = new Shipment();
        $shipment->tracking_id = $trackingId;
        $shipment->sender_name = $request->sender_name;
        $shipment->sender_address = $request->sender_address;
        $shipment->sender_phone = $request->sender_phone;
        $shipment->sender_email = $request->sender_email ?? '';
        $shipment->receiver_name = $request->receiver_name;
        $shipment->receiver_address = $request->receiver_address;
        $shipment->receiver_phone = $request->receiver_phone;
        $shipment->receiver_email = $request->receiver_email ?? '';
        $shipment->package_name = $request->package_name;
        $shipment->origin = $request->origin;
        $shipment->carrier = $request->carrier;
        $shipment->carrier_reference_no = $request->carrier_reference_no;
        $shipment->status = $request->status;
        $shipment->status_message = $request->status_message ?? null;

        // Set specific message for "Received" status
        if (strtolower($request->status) === 'received') {
            $shipment->status_message = 'Package received at Shipex facilities for shipping';
        }

        $shipment->weight = $request->weight;
        $shipment->departure_date = $request->departure_date;
        $shipment->expected_delivery_date = $request->expected_delivery_date;
        $shipment->destination = $request->destination;
        $shipment->shipment_mode = $request->shipment_mode ?? 'VAN FREIGHT';
        $shipment->payment_mode = 'CASH';
        $shipment->delivery_time = $request->delivery_time;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('shipments', 'public');
            $shipment->image_path = $path;
        }

        $history = [
            [
                'status' => 'Received',
                'message' => 'Package received at the SHIPEX facility office ready for packing and departure',
                'updated_at' => now()->format('Y-m-d H:i:s')
            ],
            [
                'status' => $request->status,
                'message' => $shipment->status_message ?? 'Initial status set',
                'updated_at' => now()->format('Y-m-d H:i:s')
            ]
        ];
        $shipment->status_history = json_encode($history);
        $shipment->save();

        $receiptsPath = storage_path('app/public/receipts');
        if (!File::exists($receiptsPath)) {
            File::makeDirectory($receiptsPath, 0755, true);
        }

        $barcodePath = 'barcodes/' . $trackingId . '.png';
        if (!Storage::disk('public')->exists('barcodes')) {
            Storage::disk('public')->makeDirectory('barcodes');
        }

        if (!Storage::disk('public')->exists($barcodePath)) {
            $dummyBarcodeContent = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=');
            Storage::disk('public')->put($barcodePath, $dummyBarcodeContent);
        }

        $logoPath = public_path('images/logo.png');
        $logoBase64 = null;
        if (File::exists($logoPath)) {
            $logoBase64 = 'data:image/png;base64,' . base64_encode(File::get($logoPath));
        }

        $barcodeFullPath = storage_path('app/public/' . $barcodePath);
        $barcodeBase64 = null;
        if (File::exists($barcodeFullPath)) {
            $barcodeBase64 = 'data:image/png;base64,' . base64_encode(File::get($barcodeFullPath));
        }

        try {
            $pdf = Pdf::loadView('receipt', compact('shipment', 'barcodeBase64'));
            $pdf->save(storage_path('app/public/receipts/' . $trackingId . '.pdf'));
        } catch (\Exception $e) {
            Log::error('Failed to save PDF: ' . $e->getMessage());
        }

        return redirect()->route('admin.dashboard')->with('success', 'Shipment created successfully');
    }

    public function track(Request $request)
    {
        $trackingId = $request->query('tracking_id');
        if ($trackingId) {
            $shipment = Shipment::where('tracking_id', $trackingId)->first();
            return view('tracking', compact('shipment'));
        }
        return view('track');
    }

    public function downloadReceipt($trackingId)
    {
        $shipment = Shipment::where('tracking_id', $trackingId)->firstOrFail();

        if (!Storage::disk('public')->exists('barcodes')) {
            Storage::disk('public')->makeDirectory('barcodes');
        }

        $barcodePath = 'barcodes/' . $trackingId . '.png';
        if (!Storage::disk('public')->exists($barcodePath)) {
            $dummyBarcodeContent = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=');
            Storage::disk('public')->put($barcodePath, $dummyBarcodeContent);
        }

        $logoPath = public_path('images/logo.png');
        $logoBase64 = null;
        if (File::exists($logoPath)) {
            $logoBase64 = 'data:image/png;base64,' . base64_encode(File::get($logoPath));
        }

        $barcodeFullPath = storage_path('app/public/' . $barcodePath);
        $barcodeBase64 = null;
        if (File::exists($barcodeFullPath)) {
            $barcodeBase64 = 'data:image/png;base64,' . base64_encode(File::get($barcodeFullPath));
        }

        $pdf = Pdf::loadView('receipt', compact('shipment', 'barcodeBase64'));
        return $pdf->download($trackingId . '.pdf');
    }

    public function viewReceipt($trackingId)
    {
        $shipment = Shipment::where('tracking_id', $trackingId)->firstOrFail();

        if (!Storage::disk('public')->exists('barcodes')) {
            Storage::disk('public')->makeDirectory('barcodes');
        }

        $barcodePath = 'barcodes/' . $trackingId . '.png';
        if (!Storage::disk('public')->exists($barcodePath)) {
            $dummyBarcodeContent = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=');
            Storage::disk('public')->put($barcodePath, $dummyBarcodeContent);
        }

        $logoPath = public_path('images/logo.png');
        $logoBase64 = null;
        if (File::exists($logoPath)) {
            $logoBase64 = 'data:image/png;base64,' . base64_encode(File::get($logoPath));
        }

        $barcodeFullPath = storage_path('app/public/' . $barcodePath);
        $barcodeBase64 = null;
        if (File::exists($barcodeFullPath)) {
            $barcodeBase64 = 'data:image/png;base64,' . base64_encode(File::get($barcodeFullPath));
        }

        $pdf = Pdf::loadView('receipt', compact('shipment', 'barcodeBase64'));
        return $pdf->stream($trackingId . '.pdf');
    }

    public function edit($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.edit-shipment', compact('shipment'));
    }

    public function update(Request $request, $id)
    {
        $shipment = Shipment::findOrFail($id);

        $request->validate([
            'status' => 'required',
            'status_message' => 'nullable',
            'image' => 'image|nullable',
        ]);

        $shipment->status = $request->status;
        $shipment->status_message = $request->status_message ?? $shipment->status_message;

        // Set specific message for "Received" status
        if (strtolower($request->status) === 'received') {
            $shipment->status_message = 'Package received at Shipex facilities for shipping';
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('shipments', 'public');
            $shipment->image_path = $path;
        }

        $history = $shipment->status_history ? json_decode($shipment->status_history, true) : [];
        $history[] = [
            'status' => $request->status,
            'message' => $shipment->status_message ?? 'Status updated',
            'updated_at' => now()->format('Y-m-d H:i:s')
        ];
        $shipment->status_history = json_encode($history);
        $shipment->save();

        return redirect()->route('admin.shipment-list')->with('success', 'Shipment updated successfully');
    }

    public function shipmentList()
    {
        $shipments = Shipment::all();
        return view('admin.shipment-list', compact('shipments'));
    }

    public function destroy($id)
    {
        $shipment = Shipment::findOrFail($id);

        // Delete associated image if it exists
        if ($shipment->image_path && Storage::disk('public')->exists($shipment->image_path)) {
            Storage::disk('public')->delete($shipment->image_path);
        }

        // Delete associated receipt if it exists
        $receiptPath = 'receipts/' . $shipment->tracking_id . '.pdf';
        if (Storage::disk('public')->exists($receiptPath)) {
            Storage::disk('public')->delete($receiptPath);
        }

        // Delete associated barcode if it exists
        $barcodePath = 'barcodes/' . $shipment->tracking_id . '.png';
        if (Storage::disk('public')->exists($barcodePath)) {
            Storage::disk('public')->delete($barcodePath);
        }

        $shipment->delete();

        return redirect()->route('admin.shipment-list')->with('success', 'Shipment deleted successfully');
    }
}