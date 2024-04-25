<div>
    <div class="flex flex-col sm:flex-row items-center mb-4 mt-5 ml-6">
        <div class="mb-4 sm:mb-0 sm:mr-2">
            <input type="text" wire:model="search" placeholder="Buscar por nombre" class="px-4 py-2 rounded-l-md border-gray-300 focus:outline-none focus:ring focus:border-blue-300 bg-gray-100">
            <button wire:click="buscar" class="px-4 py-2 text-white bg-blue-500 rounded-r-none hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Buscar</button>
        </div>
        @can('admin', auth()->user())
            <a href="{{ route('menus.create') }}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">Crear Menú</a>
           
        @endcan
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse ($menus as $menu)
            <div class="bg-white rounded-lg shadow-lg p-4">
                <img src="{{ asset('storage/menus/' . $menu->image) }}" alt="{{ $menu->nombre }}" class="w-full object-cover object-center mb-4">
                <h2 class="text-xl font-bold mb-2">{{ $menu->nombre }}</h2>
                <p class="text-gray-600 mb-2">{{ $menu->descripcion }}</p>
                <p class="text-green-500 font-bold text-lg mb-5">{{ $menu->precio }} Bs.</p>
                @can('admin', auth()->user())
                    <a 
                        href="{{ route('menus.edit', $menu) }}" 
                        class="text-white bg-blue-500 rounded-md hover:bg-blue-600 
                        focus:outline-none focus:bg-blue-600 px-4 py-2 mt-3"
                    >
                        Editar
                    </a>

                    <form wire:submit.prevent="destroy({{ $menu->id }})" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Eliminar Menú</button>
                    </form>
                    
                @endcan
            </div>
        @empty
            <p>No se encontraron resultados</p>
        @endforelse
    </div>

</div>