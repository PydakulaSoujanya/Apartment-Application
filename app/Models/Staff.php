<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'category',
        'gender',
        'contact',
        'email',
        'languages',
        'doj',
        'aadhar',
        'status',
    ];
}
