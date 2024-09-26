<?php

namespace App\Http\Controllers;

use App\Models\EntryPass;
use Illuminate\Http\Request;

class ManagerEntryPassController extends Controller
{
    public function index()
    {
        // Retrieve all entry passes, ordered by date
        $entryPasses = EntryPass::orderBy('from_date', 'desc')->get();

        // Return the view with the entry passes data
        return view('manager.entry-passes.index', compact('entryPasses'));
    }
}
