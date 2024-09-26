<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntryPass;
use Illuminate\Support\Facades\Auth;

class EntryPassController extends Controller
{
    public function create()
    {
        return view('resident.entry_pass.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'visitor_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'pass_description' => 'required|string',
        ]);

        EntryPass::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'visitor_name' => $request->visitor_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'pass_description' => $request->pass_description,
        ]);

        return redirect()->route('resident.entry-passes.index')->with('success', 'Entry pass created successfully.');
    }

    public function index(Request $request)
    {
        $query = EntryPass::where('user_id', Auth::id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('category', 'LIKE', "%{$search}%")
                  ->orWhere('visitor_name', 'LIKE', "%{$search}%")
                  ->orWhere('phone_number', 'LIKE', "%{$search}%")
                  ->orWhere('address', 'LIKE', "%{$search}%")
                  ->orWhere('from_date', 'LIKE', "%{$search}%")
                  ->orWhere('to_date', 'LIKE', "%{$search}%");
            });
        }

        $entryPasses = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('resident.entry_pass.view-entrypass', compact('entryPasses'));
    }

    public function show($id)
    {
        $entryPass = EntryPass::where('user_id', Auth::id())->findOrFail($id);
        return view('resident.entry_pass.show-entrypass', compact('entryPass'));
    }

    public function edit($id)
    {
        $entryPass = EntryPass::where('user_id', Auth::id())->findOrFail($id);
        return view('resident.entry_pass.edit-entrypass', compact('entryPass'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'visitor_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'pass_description' => 'required|string',
        ]);

        $entryPass = EntryPass::where('user_id', Auth::id())->findOrFail($id);
        $entryPass->update($request->only([
            'category', 'visitor_name', 'phone_number', 'address', 'from_date', 'to_date', 'pass_description'
        ]));

        return redirect()->route('resident.entry-passes.index')->with('success', 'Entry pass updated successfully.');
    }

    public function destroy($id)
    {
        $entryPass = EntryPass::where('user_id', Auth::id())->findOrFail($id);
        $entryPass->delete();

        return redirect()->route('resident.entry-passes.index')->with('success', 'Entry pass deleted successfully.');
    }
}
