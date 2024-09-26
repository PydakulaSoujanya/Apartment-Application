<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('vehicles', function (Blueprint $table) {
    $table->id();
    $table->integer('slotNo');
    $table->string('slotName');
    $table->string('slotType');
    $table->string('block');
    $table->integer('unitNo');
    $table->string('status');
    $table->string('name');
    $table->string('vehicleNo');
    $table->string('vehicleType');
    $table->string('rfidNo')->nullable();
    $table->date('fromDate');
    $table->date('toDate')->nullable();
    $table->string('additionalField')->nullable();
    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
