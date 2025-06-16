<ul class="flex space-x-4">
    <li><a href="/" class="text-gray-600 hover:text-blue-500">Home</a></li>
    <li><a href="#products" class="text-gray-600 hover:text-blue-500">Products</a></li>
    <li><a href="/cart" class="text-gray-600 hover:text-blue-500">Cart</a></li>
    @auth
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-red-500">Log out</button>
            </form>
        </li>
    @else
        <li><a href="/login" class="text-gray-600 hover:text-blue-500">Log in</a></li>
    @endauth
</ul>
