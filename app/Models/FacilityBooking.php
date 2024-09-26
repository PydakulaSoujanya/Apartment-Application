<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FacilityBooking extends Model
{
    protected $table = 'facilities_booking'; // Adjust the table name if needed

    // Fillable fields
    protected $fillable = [
        'facility_id', 'date', 'start_time', 'end_time', 'booked_for', 'community_purpose', 'user_id'
    ];
}
