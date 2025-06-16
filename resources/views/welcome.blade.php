@extends('layouts.app')

@section('content')
<!-- Top Banner -->
<div class="bg-black text-white text-sm text-center py-2">
    Free shipping, 30-day return or refund guarantee.
</div>

<!-- Navbar -->
<nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <div class="text-2xl font-bold tracking-tight text-gray-800">Male <span class="text-red-500">fashion</span>.</div>
    <ul class="hidden md:flex space-x-6 font-semibold">
        <li><a href="/" class="text-gray-800 hover:text-red-500 border-b-2 border-red-500">Home</a></li>
        <li><a href="/shop" class="text-gray-700 hover:text-red-500">Shop</a></li>
        <li><a href="/pages" class="text-gray-700 hover:text-red-500">Pages</a></li>
        <li><a href="/blog" class="text-gray-700 hover:text-red-500">Blog</a></li>
        <li><a href="/contact" class="text-gray-700 hover:text-red-500">Contacts</a></li>
    </ul>
    <div class="flex items-center space-x-4">
        <a href="/login" class="text-sm text-gray-700 hover:text-red-500">Sign In</a>
        <a href="/faqs" class="text-sm text-gray-700 hover:text-red-500">FAQs</a>
        <div class="text-sm text-gray-700">USD ▼</div>
        <a href="/cart" class="text-xl text-gray-700 hover:text-red-500">
            <i class="fas fa-shopping-bag"></i> <span class="text-sm">$0.00</span>
        </a>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gray-50">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 items-center px-6 py-16">
        <div class="space-y-4">
            <p class="text-sm uppercase text-red-500 font-semibold tracking-wide">Summer Collection</p>
            <h1 class="text-4xl md:text-5xl font-extrabold">Fall – Winter<br>Collections 2030</h1>
            <p class="text-gray-600 max-w-md">A specialist label creating luxury essentials. Ethically crafted with an unwavering commitment to exceptional quality.</p>
            <a href="#new-products" class="inline-block mt-4 px-6 py-2 bg-black text-white font-medium rounded hover:bg-red-500 scroll-smooth">Shop Now →</a>
        </div>
        <div class="mt-8 md:mt-0">
            <img src="{{ asset('images/male-model.png') }}" alt="Hero Model" class="w-full">
        </div>
    </div>
</section>

<!-- New Products Section -->
<section id="new-products" class="py-16 bg-white px-6">
    <h2 class="text-3xl font-bold mb-10 text-center">New Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($products as $product)
            <div class="border rounded-lg p-4 shadow hover:shadow-md transition-all relative">
    @if ($product->label)
        <span class="absolute top-2 left-2 text-xs px-2 py-1 bg-{{ $product->label_color }}-500 text-white rounded">
            {{ strtoupper($product->label) }}
        </span>
    @endif

    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-contain mb-4">

    <p class="uppercase text-xs text-gray-500 font-semibold">{{ $product->category }}</p>
    <h3 class="font-medium text-lg">{{ $product->name }}</h3>

    <div class="flex items-center text-yellow-400 text-sm my-1">
        @for ($i = 0; $i < 5; $i++)
            <i class="fas fa-star{{ $i < $product->rating ? '' : '-o' }}"></i>
        @endfor
    </div>

    <div class="text-lg font-bold text-black">
        ${{ $product->price }}
        <span class="line-through text-sm text-gray-400 ml-2">${{ $product->old_price }}</span>
    </div>

    <a href="{{ route('buy.show', $product->id) }}" class="block mt-4 text-center bg-black text-white py-2 rounded hover:bg-red-500">
        BUY
    </a>
</div>

        @endforeach
    </div>
</section>


<!-- Footer Icons -->
<footer class="flex justify-center space-x-6 py-6">
    <a href="#"><i class="fab fa-twitter text-gray-600 hover:text-blue-500"></i></a>
    <a href="#"><i class="fab fa-facebook text-gray-600 hover:text-blue-600"></i></a>
    <a href="#"><i class="fab fa-pinterest text-gray-600 hover:text-red-500"></i></a>
    <a href="#"><i class="fab fa-instagram text-gray-600 hover:text-pink-500"></i></a>
</footer>
@endsection
