<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    // index
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();      // Get all categories
        $brands = Brand::all();             // Get all brands

        return view("product.create", compact('products', 'categories', 'brands'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
        ]);

        // Save the product to the database
        Product::create([
            'name' => $request->name,

            'cost' => $request->cost,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id
        ]);

        // Redirect with success message
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }


    public function show(string $id)
    {
        // Retrieve the product by ID
        $product = Product::findOrFail($id); // Use findOrFail for better error handling

        // Pass the product to a proper view
        return view('product.show', compact('product'));
    }
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all();
        $categories = Category::all();      // Get all categories
        $brands = Brand::all();

        return view('product.edit', compact('product', 'products', 'categories', 'brands'));
    }
    public function update(Request $request, string $id)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',

        ]);

        // If validation fails, redirect back with a message
        if ($validator->fails()) {
            return redirect()->route('product.index')->with('error', 'Validation failed.');
        }

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update the product
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        // Redirect with success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
