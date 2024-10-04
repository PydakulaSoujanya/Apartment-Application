<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'time', 'duration', 'brief_topic', 'venue', 'notes', 'agenda', 'attendees', 'alert',
    ];

    protected $casts = [
        'agenda' => 'array',
        'alert' => 'array',
    ];
}
