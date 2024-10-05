<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchmanDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'admin_id',  
        'name',
        'mobile',
        'email',
        'qualification',
        'experience',
        'aadhar_no',
        'address',
        'vendor_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
