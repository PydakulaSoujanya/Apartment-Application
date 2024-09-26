<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function neighbours()
    {
        // Return the correct Blade view from resources/views/resident/directory/neighbours.blade.php
        return view('resident.directory.neighbours');
    }
}
