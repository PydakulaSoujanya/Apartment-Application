<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Staff name
            $table->unsignedBigInteger('category'); // Category as a foreign key
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->enum('gender', ['Male', 'Female', 'Other']); // Gender
            $table->string('contact'); // Contact number
            $table->string('email')->unique(); // Email with unique constraint
            $table->string('languages'); // Known languages
            $table->date('doj'); // Date of joining
            $table->string('aadhar'); // Aadhar number
            $table->enum('status', ['Active', 'Inactive']); // Status (Active/Inactive)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            // Drop foreign key constraint before dropping the table
            $table->dropForeign(['category']);
        });

        Schema::dropIfExists('staff');
    }
}
