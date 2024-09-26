<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        if (request()->ajax()) {
            return response()->json($category);
        }
        return view('admin.category.edit', compact('category'));
    }
    

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category deleted successfully.');
    }

    public function showRegisterForm()
{
    $categories = Category::all(); // Fetch all categories from the database
    return view('admin.newuser', compact('categories'));
}

}
