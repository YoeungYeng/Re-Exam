@extends('brand.layout')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow p-4 rounded-lg w-[500px] h-[500px]">
        <h2 class="text-2xl font-bold text-center mb-4">Brand</h2>

        <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Brand Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $brand->name) }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $brand->email) }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $brand->phone) }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo:</label>
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700">Logo:</label>
                    <input type="text" name="logo" id="logo" required value="{{ old('logo', $brand->logo) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection

@section('table')
    <div class="relative overflow-x-auto mt-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">All Brands</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Brand Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Phone</th>
                    <th scope="col" class="px-6 py-3">Logo</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $b)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $b->name }}</td>
                        <td class="px-6 py-4">{{ $b->email }}</td>
                        <td class="px-6 py-4">{{ $b->phone }}</td>
                        <td class="px-6 py-4">{{ $b->logo }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('brand.edit', $b->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('brand.destroy', $b->id) }}" method="POST" class="inline-block ml-2"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No brands found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection