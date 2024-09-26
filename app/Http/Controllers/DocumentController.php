<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('resident/document.index'); // Assuming your Blade template is located in resources/views/document/index.blade.php
    }
}
