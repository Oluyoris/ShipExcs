<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusHistoryToShipments extends Migration
{
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->json('status_history')->nullable()->after('status_message');
        });
    }

    public function down()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn('status_history');
        });
    }
}