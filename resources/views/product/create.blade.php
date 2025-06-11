@extends('product.layout')

@section('content')
    <div class="max-w-md mx-auto bg-whit p-6 rounded-lg w-full h-auto mb-2">
        <h1 class="text-2xl font-bold  text-center text-gray-800">Product</h1>

        <form action="{{ route('product.store') }}" class="mt-1" enctype="multipart/form-data" method="POST"
            class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Cost:</label>
                <input type="number" name="cost" id="name" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" name="price" id="name" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Category:</label>
                <select
                    class="mt-1  block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    name="category_id" id="category_id" class="...">
                    <option value="">Select Category</option>
                    @foreach ($categories as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Brands:</label>
                <select
                    class="mt-1 mb-3 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    name="brand_id" id="brand_id" class="...">
                    <option value="">Select Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection

@section('table')
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cost
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Brand
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $product->cost }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $product->price }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $product->category_id }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $product->brand_id }}
                        </td>

                        <td class="px-6 py-4">
                            <a href="{{ route('product.edit', $product->id) }}"
                                class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                class="inline-block ml-2" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-gray-500">No categories found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection