@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow">
        <div class="flex flex-col md:flex-row gap-6">
            <img src="{{ asset('storage/' . $product->image) }}" class="w-full md:w-1/2 object-contain" alt="{{ $product->name }}">
            <div class="flex-1">
                <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
                <p class="text-gray-600 mb-4">{{ $product->category }}</p>
                <div class="text-lg text-black font-bold mb-4">
                    ${{ number_format($product->price, 2) }}
                    @if($product->old_price)
                        <span class="line-through text-sm text-gray-400 ml-2">${{ number_format($product->old_price, 2) }}</span>
                    @endif
                </div>

                @auth
                    @if($product->stock > 0)
                        <form action="{{ route('checkout', $product->id) }}" method="POST">
                            @csrf
                            <label for="quantity" class="block mb-1 font-semibold">Quantity:</label>
                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                value="1"
                                min="1"
                                max="{{ $product->stock }}"
                                class="border rounded p-2 mb-4 w-24"
                                required
                            >
                            <p class="text-sm text-gray-600 mb-4">Available stock: {{ $product->stock }}</p>
                            <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-red-500">
                                Confirm Purchase
                            </button>
                        </form>
                    @else
                        <p class="text-red-600 font-semibold">Sorry, this product is out of stock.</p>
                    @endif
                @else
                    <p class="text-red-600 font-semibold">
                        You must <a href="{{ route('login') }}" class="underline">log in</a> to purchase this item.
                    </p>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
