<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // Define the table if it's not the plural form of the model name
    protected $table = 'vehicles';

    // Fillable fields for mass assignment
    protected $fillable = [
        'slotNo',
        'slotName',
        'slotType',
        'block',
        'unitNo',
        'status',
        'name',
        'vehicleNo',
        'vehicleType',
        'rfidNo',
        'fromDate',
        'toDate',
        'additionalField',
    ];
}
