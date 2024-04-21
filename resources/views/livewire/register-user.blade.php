<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Registro</h2>
        <form wire:submit.prevent="register" novalidate>
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input wire:model="name" placeholder="Ingresa tu nombre" type="text" name="name" id="name" class="p-3 mt-1 block w-full border-gray-500 rounded-md shadow-sm focus:border-green-600 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input wire:model="email" placeholder="Ingresa tu correo" type="email" name="email" id="email" class="p-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-400 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input wire:model="password" placeholder="Ingresa tu contraseña" type="password" name="password" id="password" class="p-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-400 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
                <input wire:model="password_confirmation" placeholder="Confirma tu contraseña" type="password" name="password_confirmation" id="password_confirmation" class="p-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-400 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                @error('password_confirmation') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <a href="{{route('login')}}">
                <p class="text-sm text-green-600 hover:text-green-800 mb-2">¿Ya tienes cuenta? Inicia Sesión</p>
            </a>
            <div class="flex items-center justify-between">
                <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 focus:ring-opacity-50">Registrarse</button>
            </div>


        </form>
    </div>
</div>

