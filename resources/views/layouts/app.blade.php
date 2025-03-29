<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'E-Commerce') }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600">MyShop</a>
            <a href="/cart" class="text-gray-700 hover:text-blue-500">🛒 Cart (0)</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto my-8 px-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-white text-center p-4 mt-8 shadow-md">
        <p class="text-gray-500">&copy; {{ date('Y') }} MyShop. All rights reserved.</p>
    </footer>

</body>
</html>
