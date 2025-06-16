<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Man Series</title>
    <!-- Add this inside your <head> tag -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  rel="stylesheet"
/>


    <!-- Load Vite CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- For FontAwesome icons, use CDN here -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-pIV3FZjP0l1D7D4x16Vyo3eU+7Lnc7sF6qTAF91t+EelboYLYeX1T5cX7Nby8iAtOfmxOGfVr92FzhvPvmwKkg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body class="bg-white text-gray-800">

    @yield('content')

</body>
</html>
