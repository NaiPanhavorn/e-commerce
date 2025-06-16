<div class="bg-white p-4 rounded shadow">
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-2">
    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
    <p class="text-sm text-gray-600">{{ $product->description }}</p>
    <p class="text-blue-600 font-bold mt-1">$ {{ $product->price }}</p>
    <form method="POST" action="{{ route('cart.add', $product->id) }}">
        @csrf
        <button class="mt-2 bg-blue-500 text-white px-4 py-1 rounded">Add to Cart</button>
    </form>
</div>
<form action="{{ route('checkout', $product->id) }}" method="POST">
    @csrf
    <input type="hidden" name="quantity" value="1">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Buy</button>
</form>
