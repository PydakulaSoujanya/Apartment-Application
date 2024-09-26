<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenancePayment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'payment_date'];

    // Relation to the User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
