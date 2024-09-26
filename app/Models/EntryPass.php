<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryPass extends Model
{
    use HasFactory;

    protected $fillable = [
   
        'category',
        'visitor_name',
        'phone_number',
        'address',
        'from_date',
        'to_date',
        'pass_description',
        'user_id',
    ];

    // Disabling auto-incrementing since 'id' is not a traditional primary key
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger';
}
