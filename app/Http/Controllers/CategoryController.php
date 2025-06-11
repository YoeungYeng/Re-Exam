<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function create()
    {
        // Optionally show a separate form
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('category.index')->with('error', 'Validation failed.');
        }

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('category.index')->with('error', 'Validation failed.');
        }

        $category = Category::findOrFail($id); // Fixed typo
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
