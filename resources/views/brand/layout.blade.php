<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />



    <!-- Tailwind CSS (via CDN for simplicity) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 w-full h-screen font-sans antialiased">
    <nav class="fixed top-0 left-0 w-full bg-blue-400 p-4 text-white shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4">
            <ul class="flex justify-center items-center gap-6 py-4">
                <li>
                    <a href="/"
                        class="{{ request()->is('/') ? 'bg-amber-500 text-white' : '' }} hover:bg-amber-500 px-4 py-2 rounded hover:text-white transition">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/brand"
                        class="{{ request()->is('brand') ? 'bg-amber-500 text-white' : '' }} hover:bg-amber-500 px-4 py-2 rounded hover:text-white transition">
                        Brands
                    </a>
                </li>
                <li>
                    <a href="/category"
                        class="{{ request()->is('category') ? 'bg-amber-500 text-white' : '' }} hover:bg-amber-500 px-4 py-2 rounded hover:text-white transition">
                        Category
                    </a>
                </li>
                <li>
                    <a href="/product"
                        class="{{ request()->is('product') ? 'bg-amber-500 text-white' : '' }} hover:bg-amber-500 px-4 py-2 rounded hover:text-white transition">
                        Product
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">CRUD Operation</h1>
    <div class=" mx-auto py-10 flex justify-between items-center  w-full h-full  flex-col">



        <div class=" w-[500px] h-[600px] rounded-lg p-2 mb-2">
            @yield('content')
        </div>
        <div class="w-[1000px] h-auto p-2">
            @yield('table')
        </div>
    </div>
</body>

</html>