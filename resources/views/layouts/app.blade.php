<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RestaurantApp - @yield('titulo')</title>
    @vite('resources/css/app.css')
</head>
<body>
    
    <header class="p-3 bg-white text-white shadow">
        <div class="container flex mx-auto justify-between items-center flex-col md:flex-row">
            <a href="{{ route('principal') }}" class="mb-4 md:mb-0 text-3xl font-bold text-black hover:text-gray-800 transition-colors duration-300">
                <span class="text-green-600">Restaurant-</span><span class="text-blue-800">App</span>
            </a>
            <nav class="text-xl flex  items-center gap-4 flex-col md:flex-row mt-2 md:mt-0">
                <a href="{{route('login')}}" class="text-green-600">Login</a>
                <a href="{{ route('register') }}" class="text-green-600">Registro</a>
            </nav>
        </div>
        
    </header>

    <main>
        @yield('contenido')
    </main>
    <footer class="fixed bottom-0 w-full py-4">
        <p class="text-center font-semibold">Todos los derechos reservados. Leodomí Sotomayor {{now()->year}}</p>
    </footer>
</body>
</html>