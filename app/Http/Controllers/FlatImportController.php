<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Imports\FlatsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class FlatImportController extends Controller
{
    // Show upload form
    public function showUploadForm()
    {
        return view('admin.flatimport.upload');
    }

    // Handle file import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new FlatsImport, $request->file('file'));

        return redirect()->route('admin.flatimport.index')->with('success', 'Flats imported successfully.');
    }

    // Display imported flats
    public function index()
    {
        $flats = Flat::all();
        return view('admin.flatimport.index', compact('flats'));
    }

    // Show the edit form for a flat
    public function edit($id)
    {
        $flat = Flat::findOrFail($id);
        return view('admin.flatimport.edit', compact('flat'));
    }

    // Update flat details
    public function update(Request $request, $id)
    {
        $flat = Flat::findOrFail($id);
        $flat->update($request->all());

        return redirect()->route('admin.flatimport.index')->with('success', 'Flat updated successfully.');
    }

    // Delete a flat
    public function destroy($id)
    {
        $flat = Flat::findOrFail($id);
        $flat->delete();

        return redirect()->route('admin.flatimport.index')->with('success', 'Flat deleted successfully.');
    }



    public function flatCount()
    {
        // Count all entries in the 'flats' table
        $flatCount = Flat::count();

        return view('admin.adminHome', [
            'flatCount' => $flatCount
        ]);
    }
    

}
