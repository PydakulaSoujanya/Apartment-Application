<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $table = 'parking';

    protected $fillable = [
        'slot_no',
        'slot_name',
        'slot_type',
        'block',
        'unit_no',
        'status',
        'name',
        'vehicle_no',
        'vehicle_type',
        'rfid_no',
        'from_date',
        'to_date',
        'additional_info',
    ];
}

