<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Ensure DB facade is imported
use Illuminate\Support\Facades\Storage;
use App\Models\Vendor;  // Include Vendor model for fetching vendor names


class ExpenseController extends Controller
{
    // Function to show the create expense form
    public function create()
    {
        // Fetch all vendors with their names (vendor_name column)
        $vendors = DB::table('vendors')->select('id', 'vendor_name')->get();
    
        // Pass vendors to the view
        return view('admin.expenses.create', compact('vendors'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'vendor_name' => 'required|exists:vendors,id',  // Ensure vendor_name exists in the vendors table
            'category' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'paid_date' => 'required|date',
            'month' => 'required|string',
            'file' => 'nullable|file|max:2048',
        ]);


        $fileName = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();  // Generate unique file name
            $file->move(public_path('expenses'), $fileName);  // Store file in public/expenses
        }

        Expense::create([
            'vendor_name' => $request->vendor_name,  // Save the vendor ID

            'category' => $request->category,
            'description' => $request->description,
            'amount' => $request->amount,
            'paid_date' => $request->paid_date,
            'month' => $request->month,
            'file_path' => $fileName,  // Only the file name is saved in the database
        ]);

        return redirect()->back()->with('success', 'Expense added successfully');
    }

     // List all expenses
     public function index()
     {
         // Eager load the 'vendor' relationship to get vendor details efficiently
         $expenses = Expense::with('vendor')->get();  // Retrieve all expenses with their associated vendors
         return view('admin.expenses.index', compact('expenses'));
     }
     
 
     // Display the form for editing an existing expense
     public function edit($id)
 {
     $expense = Expense::findOrFail($id);
     $vendors = Vendor::all(); // Fetch all vendors for the dropdown
     return view('admin.expenses.edit', compact('expense', 'vendors'));
 }
 
     // Update an existing expense in the database
     public function update(Request $request, $id)
     {
         $request->validate([
             'vendor_name' => 'required|exists:vendors,id',  // Ensure vendor_name exists in the vendors table
             'category' => 'required|string',
             'description' => 'nullable|string',
             'amount' => 'required|numeric',
             'paid_date' => 'required|date',
             'month' => 'required|string',
             'file' => 'nullable|file|max:2048',
         ]);
 
         $expense = Expense::findOrFail($id);
 
         $fileName = $expense->file_path;  // Keep the old file name if no new file is uploaded
         if ($request->hasFile('file')) {
             // Delete the old file if it exists
             if ($expense->file_path) {
                 $oldFilePath = public_path('expenses/' . $expense->file_path);
                 if (file_exists($oldFilePath)) {
                     unlink($oldFilePath);
                 }
             }
 
             // Upload the new file
             $file = $request->file('file');
             $fileName = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path('expenses'), $fileName);
         }
 
         // Update the expense entry
         $expense->update([
             'vendor_name' => $request->vendor_name,
             'category' => $request->category,
             'description' => $request->description,
             'amount' => $request->amount,
             'paid_date' => $request->paid_date,
             'month' => $request->month,
             'file_path' => $fileName,
         ]);
 
         return redirect()->route('expenses.index')->with('success', 'Expense updated successfully');
     }
 
     // Delete an expense from the database
     public function destroy($id)
     {
         $expense = Expense::findOrFail($id);
 
         // Delete the file if it exists
         if ($expense->file_path) {
             $filePath = public_path('expenses/' . $expense->file_path);
             if (file_exists($filePath)) {
                 unlink($filePath);
             }
         }
 
         // Delete the expense entry
         $expense->delete();
         return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
     }
 }
 