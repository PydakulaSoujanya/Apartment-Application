<?php

namespace App\Http\Controllers;

use App\Models\ResidentDetail;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function show($id)
    {
        // Fetch the resident by ID
        $resident = ResidentDetail::find($id);

        // If no resident is found, return a 404 error
        if (!$resident) {
            abort(404, 'Resident not found');
        }

        // Pass the resident data to the view
        return view('resident.profile.index', ['resident' => $resident]);
    }
}

