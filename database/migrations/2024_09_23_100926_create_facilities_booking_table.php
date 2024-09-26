<?php

// create_facilities_booking_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesBookingTable extends Migration
{
    public function up()
    {
        Schema::create('facilities_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities'); // Assuming a facilities table
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('booked_for');
            $table->boolean('community_purpose');
            $table->foreignId('user_id')->constrained('users'); // Assuming a users table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities_booking');
    }
}
