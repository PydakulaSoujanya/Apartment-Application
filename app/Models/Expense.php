<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_name',  // This holds the foreign key (vendor_id)
        'category',
        'description',
        'amount',
        'paid_date',
        'month',
        'file_path',
    ];

    // Define relationship to Vendor model
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_name', 'id');
    }
}

// class Vendor extends Model
// {
//     protected $table = 'vendors'; 
// }
