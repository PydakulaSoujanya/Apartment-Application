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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('visitor_name');
            $table->string('visitor_number');
            $table->string('visiting_reason');
            $table->date('visiting_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('flat_number');   // New field
            $table->string('resident_name'); // New field
            $table->string('checkin_time')->nullable();   // Make nullable
            $table->string('checkout_time')->nullable();  // Make nullable
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
};
