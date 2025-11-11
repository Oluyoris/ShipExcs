<?php
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [ShipmentController::class, 'index'])->name('dashboard');
    Route::get('/shipments/create', [ShipmentController::class, 'create'])->name('shipments.create');
    Route::post('/shipments', [ShipmentController::class, 'store'])->name('shipments.store');
    Route::get('/shipments', [ShipmentController::class, 'shipmentList'])->name('shipment-list');
    Route::get('/shipment/{id}/edit', [ShipmentController::class, 'edit'])->name('shipment.edit');
    Route::put('/shipment/{id}', [ShipmentController::class, 'update'])->name('shipment.update');
    Route::delete('/shipment/{id}', [ShipmentController::class, 'destroy'])->name('shipment.destroy');
    Route::get('/messages', [ContactController::class, 'messages'])->name('messages');
});

Route::get('/download/receipt/{trackingId}', [ShipmentController::class, 'downloadReceipt'])->name('download.receipt');
// New route for viewing receipt as PDF
Route::get('/receipt/{trackingId}', [ShipmentController::class, 'viewReceipt'])->name('view.receipt');

Auth::routes();

Route::view('/', 'home')->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'service')->name('services');
// Use controller-based route for /track
Route::get('/track', [ShipmentController::class, 'track'])->name('track');