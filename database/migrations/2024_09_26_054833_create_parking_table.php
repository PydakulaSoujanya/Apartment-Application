<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingTable extends Migration
{
    public function up()
    {
        Schema::create('parking', function (Blueprint $table) {
            $table->id();
            $table->string('slot_no');
            $table->string('slot_name');
            $table->string('slot_type');
            $table->string('block');
            $table->string('unit_no');
            $table->string('status');
            $table->string('name');
            $table->string('vehicle_no');
            $table->string('vehicle_type');
            $table->string('rfid_no')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parking');
    }
}
