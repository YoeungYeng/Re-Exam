<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50-50">
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
                       class="{{ request()->is('brand*') ? 'bg-amber-500 text-white' : '' }} hover:bg-amber-500 px-4 py-2 rounded hover:text-white transition">
                        Brands
                    </a>
                </li>
                <li>
                    <a href="/category"
                       class="{{ request()->is('category*') ? 'bg-amber-500 text-white' : '' }} hover:bg-amber-500 px-4 py-2 rounded hover:text-white transition">
                        Category
                    </a>
                </li>
                <li>
                    <a href="/product"
                       class="{{ request()->is('product*') ? 'bg-amber-500 text-white' : '' }} hover:bg-amber-500 px-4 py-2 rounded hover:text-white transition">
                        Product
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="mt-24  p-6 text-center flex justify-center items-center">
        <h1 class="text-2xl bg-blue-400 p-4 text-white font-semibold h-[100px] text-center flex justify-center items-center">
            Welcome Re-Exame 
        </h1>
        
    </div>
    <hr>
</body>

</html>