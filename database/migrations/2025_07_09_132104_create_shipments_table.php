<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id')->unique();
            $table->string('sender_name');
            $table->string('sender_address');
            $table->string('sender_phone');
            $table->string('sender_email');
            $table->string('receiver_name');
            $table->string('receiver_address');
            $table->string('receiver_phone');
            $table->string('receiver_email');
            $table->string('package_name');
            $table->string('origin');
            $table->string('carrier');
            $table->string('carrier_reference_no');
            $table->string('status')->default('Pending');
            $table->text('status_message')->nullable();
            $table->json('status_history')->nullable(); // New column for status history
            $table->string('weight');
            $table->date('departure_date');
            $table->date('expected_delivery_date');
            $table->string('destination');
            $table->string('shipment_mode');
            $table->string('payment_mode')->default('CASH');
            $table->time('delivery_time');
            $table->string('image_path')->nullable();
            $table->text('location_map')->nullable(); // Placeholder for map data
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}