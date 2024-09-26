<?php

// app/Http/Controllers/ResidentActivityController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResidentActivityController extends Controller
{
    public function index()
    {
        return view('resident.activities.index');
    }
    public function bookingHistory()
    {
        return view('resident.activities.booking-history');
    }
}

