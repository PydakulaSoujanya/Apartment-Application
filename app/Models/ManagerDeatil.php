<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerDeatil extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'admin_id',  
        'name',
        'mobile',
        'email',
        'qualifiacation',
        'experience',
        'aadhar_no',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
