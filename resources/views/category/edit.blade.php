@extends('category.layout')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-center mb-4">Category</h2>

        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Use PUT method for update --}}

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Update Category
                </button>
            </div>
        </form>
    </div>
@endsection

@section('table')
    <div class="relative overflow-x-auto">
        <h2 class="text-xl font-bold text-gray-800 mb-4">All Categories</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('category.edit', $category->id) }}"
                                class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
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