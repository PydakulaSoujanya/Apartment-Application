<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_detail_id', // Assuming this foreign key exists
        'block_name',
        'floor',
        'flat_number',
        'flat_type',
        'amount_per_sft',
        'square_feet',
        'maintenance_fee',
        'amount_type',
        'date',
        'status',
    ];

    // Define the relationship to ResidentDetail
    public function residentDetail()
    {
        return $this->belongsTo(ResidentDetail::class, 'resident_detail_id');
    }
}
