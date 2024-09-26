<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'category',
        'topic',
        'status',
        'priority',
        'driven_by',
        'target_date',
        'file_path',
        'note',
    ];

    protected $dates = ['target_date'];
}
