<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryUser extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
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
    ];

    /**
     * Define the relationship with the User model.
     * A SecondaryUser belongs to a User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
