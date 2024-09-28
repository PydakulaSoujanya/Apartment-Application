<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'visitor_name',
        'visitor_number',
        'visitor_email', 
        'visiting_reason',
        'visiting_date',
        'user_id',
        'start_time',
        'end_time',
        'flat_number',       // New field
        'resident_name',     // New field
        'checkin_time',
        'checkout_time',
        'qr_code_filename',  // Add this line to make 'qr_code_filename' mass assignable
        'status',            // Add this line to include the 'status' field
    ];
}

