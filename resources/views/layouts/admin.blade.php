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
    <div class="flex flex-col md:flex-row h-screen">
        <aside class="bg-gray-800 text-white p-6 shadow-lg rounded-lg flex flex-col items-center md:w-1/4">
            <a href="{{ route('admin') }}" class="mb-4 md:mb-0 text-3xl font-bold text-black hover:text-gray-800 transition-colors duration-300">
                <span class="text-green-400">Restaurant-</span><span class="text-blue-300">App</span>
            </a>
            <div class="mt-20">
                <div class="flex flex-col items-center justify-center">
                    <ul>
                        <li class="mb-2">
                            <a href="#" class="flex items-center hover:bg-gray-700 px-4 py-2 rounded text-lg">
                                <span class="text-green-500 mr-2">&#8226;</span>
                                <span>Gestión de menús</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center hover:bg-gray-700 px-4 py-2 rounded text-lg">
                                <span class="text-green-500 mr-2">&#8226;</span>
                                <span>Gestión de pedidos</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center hover:bg-gray-700 px-4 py-2 rounded text-lg">
                                <span class="text-green-500 mr-2">&#8226;</span>
                                <span>Gestión de usuarios</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center hover:bg-gray-700 px-4 py-2 rounded text-lg">
                                <span class="text-green-500 mr-2">&#8226;</span>
                                <span>Gestión de reservas</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center hover:bg-gray-700 px-4 py-2 rounded text-lg">
                                <span class="text-green-500 mr-2">&#8226;</span>
                                <span>Configuración del sistema</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center hover:bg-gray-700 px-4 py-2 rounded text-lg">
                                <span class="text-green-500 mr-2">&#8226;</span>
                                <span>Informes y análisis</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    
        <div class="flex-1">
            <main>
                @yield('contenido')
            </main>
            <footer class="fixed bottom-0 w-full py-4  text-black">
                <p class="text-center font-semibold">Todos los derechos reservados. Leodomí Sotomayor {{now()->year}}</p>
            </footer>
        </div>
    </div>
    
   
</body>
</html>