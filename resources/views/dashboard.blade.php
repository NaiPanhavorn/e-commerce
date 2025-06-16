@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Total Sales -->
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-xl font-semibold">Total Sales</h2>
            <p class="text-3xl text-green-600 mt-2 font-bold">
                ${{ number_format($totalSales, 2) }}
            </p>
        </div>

        <!-- Investment -->
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-xl font-semibold">Total Investment</h2>
            <p class="text-3xl text-blue-600 mt-2 font-bold">
                ${{ number_format($totalInvestment, 2) }}
            </p>
        </div>

        <!-- Remaining Stock Items -->
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-xl font-semibold">Items in Stock</h2>
            <p class="text-3xl text-yellow-600 mt-2 font-bold">
                {{ $totalStock }} Items
            </p>
        </div>
    </div>

    <!-- Product Management Table -->
    <div class="bg-white p-6 rounded-2xl shadow-md mb-12">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Manage Products</h2>
            <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Add Product</a>
        </div>

        <table class="min-w-full table-auto text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-2">Image</th>
                    <th class="text-left p-2">Name</th>
                    <th class="text-left p-2">Category</th>
                    <th class="text-left p-2">Price</th>
                    <th class="text-left p-2">Stock</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-t">
                        <td class="p-2">
                            @if($product->image)
                                <img 
                                    src="{{ asset('storage/' . $product->image) }}" 
                                    alt="{{ $product->name }}" 
                                    class="w-16 h-16 object-cover rounded-md"
                                    style="aspect-ratio: 1 / 1;"
                                >
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded-md flex items-center justify-center text-gray-500 text-xs">No Image</div>
                            @endif
                        </td>
                        <td class="p-2">{{ $product->name }}</td>
                        <td class="p-2">{{ $product->category }}</td>
                        <td class="p-2 text-green-600 font-bold">${{ number_format($product->price, 2) }}</td>
                        <td class="p-2">{{ $product->stock }}</td>
                        <td class="p-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
