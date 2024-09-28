<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'admin_id',
        'amount',
        'date_of_payment',
        'mode_of_payment',
    ];

    public function resident()
    {
        return $this->belongsTo(ResidentDetail::class, 'resident_id');
    }

    public function admin()
    {
        return $this->belongsTo(ResidentDetail::class, 'admin_id');
    }
}
