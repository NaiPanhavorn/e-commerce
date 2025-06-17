<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Man Series</title>

    <!-- FontAwesome CDN -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
      integrity="sha512-pIV3FZjP0l1D7D4x16Vyo3eU+7Lnc7sF6qTAF91t+EelboYLYeX1T5cX7Nby8iAtOfmxOGfVr92FzhvPvmwKkg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 min-h-screen flex">

    <!-- ✅ Alert Messages -->
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
            window.location.href = "{{ url('/') }}";
        </script>
    @endif

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-100 min-h-screen p-4 shadow-md">
        <nav>
            <ul class="space-y-2">
                <li class="{{ set_active('dashboard') }}">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-200 {{ set_active('dashboard') ? 'bg-gray-300 font-semibold' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="{{ set_active('products') }}">
                    <a href="{{ route('products.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-200 {{ set_active('products') ? 'bg-gray-300 font-semibold' : '' }}">
                        <i class="fas fa-box"></i>
                        Products
                    </a>
                </li>
                <li class="{{ set_active('cart') }}">
                    <a href="{{ route('cart.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-200 {{ set_active('cart') ? 'bg-gray-300 font-semibold' : '' }}">
                        <i class="fas fa-shopping-cart"></i>
                        Cart
                    </a>
                </li>
                <!-- Add more menu items as needed -->
            </ul>
        </nav>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>
