@extends('layouts.app')

@section('content')
<!-- Add smooth scroll CSS -->
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<!-- Top Banner -->
<div class="bg-black text-white text-sm text-center py-2">
    Free shipping, 30-day return or refund guarantee.
</div>

<!-- Navbar -->
<nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <div class="text-2xl font-bold tracking-tight text-gray-800">Men <span class="text-red-500">Series</span>.</div>
    <ul class="hidden md:flex space-x-6 font-semibold">
        <li><a href="/" class="text-gray-800 hover:text-red-500 border-b-2 border-red-500">Home</a></li>
        <!-- Scrolls to New Products -->
        <li><a href="#new-products" class="text-gray-700 hover:text-red-500">Shop</a></li>
        <!-- Scrolls to Pages section -->
        <li><a href="#pages" class="text-gray-700 hover:text-red-500">Pages</a></li>
        <li><a href="/blog" class="text-gray-700 hover:text-red-500">Blog</a></li>
        <!-- Scrolls to Contact Me footer -->
        <li><a href="#contact-me" class="text-gray-700 hover:text-red-500">Contacts</a></li>
    </ul>
    <div class="flex items-center space-x-4">
        @auth
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-sm text-gray-700 hover:text-red-500 cursor-pointer">
                    Sign Out
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-red-500">Sign In</a>
        @endauth

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
            <p class="text-sm uppercase text-red-500 font-semibold tracking-wide">Summer Collection</p><br>
            <h1 class="text-4xl md:text-5xl font-extrabold">Fall – Winter<br>Collections 2030</h1>
            <p class="text-gray-600 max-w-md">A specialist label creating luxury essentials. Ethically crafted with an unwavering commitment to exceptional quality.</p>
            <a href="#new-products" class="inline-block mt-4 px-6 py-2 bg-black text-white font-medium rounded hover:bg-red-500 scroll-smooth">Shop Now →</a>
        </div>
        <div class="mt-8 md:mt-0">
            <img src="{{ asset('images/bk.jpg') }}" alt="Hero Model" class="w-[20px] h-[20px] object-cover rounded-xl">
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

<section id="pages" class="py-16 bg-black text-white px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0 text-lg font-semibold">
            Contact Me
        </div>
        <div class="flex space-x-6 text-2xl">
            <a href="https://www.tiktok.com" target="_blank" rel="noopener noreferrer" aria-label="TikTok"
                class="transition duration-300 hover:text-pink-500">
                <i class="fab fa-tiktok"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook"
                class="transition duration-300 hover:text-blue-500">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram"
                class="transition duration-300 hover:text-pink-500">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" aria-label="Twitter"
                class="transition duration-300 hover:text-blue-500">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"
                class="transition duration-300 hover:text-pink-500">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>
</section>


@endsection
