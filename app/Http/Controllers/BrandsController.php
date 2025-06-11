<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:255',
                'logo' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'message' => $validator->errors()
                ], 400);
            }


            // Save the brand to the database
            Brand::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'logo' => $request->logo,
            ]);

            return redirect()->route('brand.index')->with('success', 'Brand created successfully.');

        } catch (\Exception $e) {
            // Log the exception and return error response
            \Log::error('Brand store error: ' . $e->getMessage());

            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the brand.'
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brands = Brand::all(); // <-- get all categories for the table

        return view('brand.edit', compact('brand', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the brand
        $brand = Brand::findOrFail($id);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'logo' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()
            ], 400);
        }



        // Update the brand data
        $brand->name = $request->name;
        $brand->email = $request->email;
        $brand->phone = $request->phone;
        $brand->logo = $request->logo;
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully.');
    }
}
