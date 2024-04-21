<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Iniciar Sesión</h2>
        <form wire:submit.prevent="login" novalidate>
            @if (session()->has('error'))
                <div class="bg-red-200 text-red-800 p-4 mb-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif
            @csrf     
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
            <a href="{{route('register')}}">
                <p class="text-sm text-green-600 hover:text-green-800 mb-2">¿No tienes cuenta? Registrate</p>
            </a>
            <div class="flex items-center justify-between">
                <button 
                    type="submit" 
                    class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none
                    focus:border-green-700 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                >
                    Iniciar Sesión
                </button>
            </div>

            
        </form>
    </div>
</div>