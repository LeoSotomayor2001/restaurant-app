<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RestaurantApp - @yield('titulo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    <header class="p-3 bg-white text-white shadow">
        <div class="container flex mx-auto justify-between items-center flex-col md:flex-row">
            <a href="{{ route('principal') }}" class="flex items-center mb-4 md:mb-0 text-3xl font-bold text-black hover:text-gray-800 transition-colors duration-300">
                <img src="{{ asset('img/logo.svg') }}" alt="logo" class="w-16">
                <span class="text-green-600">Restaurant-</span><span class="text-blue-800">App</span>
            </a>
            <nav class="text-xl flex  items-center gap-4 flex-col md:flex-row mt-2 md:mt-0">
                @auth
                    <div class="flex items-center justify-center gap-4">
                        <a href="{{route('inicio')}}" class="text-green-600">Ver menu</a>
                        <a href="{{route('pedidos',auth()->user())}}" class="text-green-600">Ver pedidos</a>
                        <a href="{{route('notifications.user',auth()->user())}}" class="text-green-600">
                            <span>
                                Notificaciones 
                                <span class="badge">
                                    (
                                    {{ auth()->user()->unreadNotifications->count() }}
                                    )
                                </span>
                            </span>
                        </a>
                        <a href="{{route('logout')}}" class="text-red-600">Cerrar Sesión</a>

                    </div>
                @endauth

                @guest
                    <a href="{{route('login')}}" class="text-green-600">Login</a>
                    <a href="{{ route('register') }}" class="text-green-600">Registro</a>
                    
                @endguest
            </nav>
        </div>
        
    </header>

    <main>
        @yield('contenido')
    </main>
    <footer class="bottom-0 w-full py-4">
        <p class="text-center font-semibold">Todos los derechos reservados. Leodomí Sotomayor {{now()->year}}</p>
    </footer>
</body>
</html>