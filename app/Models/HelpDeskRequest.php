<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpDeskRequest extends Model
{
    use HasFactory;

    protected $table = 'help_desk_requests';

    protected $fillable = [
        'request_title',
        'description',
        'office',
        'category',
        'preferred_date',
        'urgent',
        'attachments',
        'status',
    ];
}
