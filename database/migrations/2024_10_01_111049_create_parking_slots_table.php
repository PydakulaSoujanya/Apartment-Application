<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('parking_slots', function (Blueprint $table) {
            $table->id();
            $table->string('slot_no'); // Slot Number
            $table->string('type');
            $table->string('block');
            $table->string('status'); // Slot Type (e.g., regular, reserved, etc.)
            $table->timestamps(); // Created and Updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('parking_slots');
    }
}
