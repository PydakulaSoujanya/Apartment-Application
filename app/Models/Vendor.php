<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'vendor_id',
        'vendor_name',
        'vendor_contact_name',
        'vendor_phone',
        'vendor_email',
        'account_head',
        'notes',
        'is_active',
        'tds_rate',
        'gstin',
        'igst',
        'cgst',
        'sgst',
        'pan_no',
        'tds_section_code',
        'vendor_legal_type',
        'payee_name',
        'billing_address',
        'bank_account_no',
        'bank_name_branch',
        'bank_ifsc_code',
        // Add other necessary fields
    ];
}
