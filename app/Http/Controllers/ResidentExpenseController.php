<?php

namespace App\Http\Controllers;

use App\Models\Expense;

class ResidentExpenseController extends Controller
{
    // Method to retrieve and display all expenses for residents
    public function apartmentexpenditure()
    {
        $expenses = Expense::all(); // Retrieve all expenses from the database
        return view('resident.expenses.index', compact('expenses')); // Ensure the view exists
    }
}