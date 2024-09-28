<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'flat_number',
        'floor',
        'block',
        'flat_type',
        'flat_holder_name',
        'name',
        'aadhar_no',
        'mobile',
        'email',
        'family_members',
        'vehicles',
        'area',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
