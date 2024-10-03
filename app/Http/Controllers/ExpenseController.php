<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Ensure DB facade is imported
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    // Function to show the create expense form
    public function create()
    {
        return view('admin.expenses.create');  // Correct view path for create.blade.php
    }

    // Function to store new expenses
    public function store(Request $request)
    {
        $request->validate([
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
            'category' => $request->category,
            'description' => $request->description,
            'amount' => $request->amount,
            'paid_date' => $request->paid_date,
            'month' => $request->month,
            'file_path' => $fileName,  // Only the file name is saved in the database
        ]);

        return redirect()->back()->with('success', 'Expense added successfully');
    }

    // Function to show all expenses
    public function index()
    {
        $expenses = Expense::all();  // Retrieve all expenses from the database
        return view('admin.expenses.index', compact('expenses'));  // Correct view path for index.blade.php
    }

    // Function to show edit form for a specific expense
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('admin.expenses.edit', compact('expense'));
    }

    // Function to update a specific expense
    public function update(Request $request, $id)
    {
        $request->validate([
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

        $expense->update([
            'category' => $request->category,
            'description' => $request->description,
            'amount' => $request->amount,
            'paid_date' => $request->paid_date,
            'month' => $request->month,
            'file_path' => $fileName,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully');
    }

    // Function to delete an expense
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

        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }

    // Add the getExpenses function here to fetch total and monthly expenses
    public function getExpenses()
    {
        
        $totalExpenses = DB::table('expenses')->sum('amount');
    
  
        $monthlyExpenses = DB::table('expenses')
            ->select(DB::raw('MONTH(paid_date) as month'), DB::raw('SUM(amount) as total'))
            ->groupBy(DB::raw('MONTH(paid_date)'))
            ->get();
    
    
        return view('admin.adminHome', [
            'totalExpenses' => $totalExpenses,
            'monthlyExpenses' => $monthlyExpenses
        ]);
    }
    
}
