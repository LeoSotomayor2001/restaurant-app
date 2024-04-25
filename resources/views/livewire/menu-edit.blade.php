<div class="mt-10">
    <form wire:submit.prevent="actualizarMenu"  novalidate enctype="multipart/form-data" class="max-w-md mx-auto p-6 bg-sky-800 shadow-md rounded-lg">
        <h1 class="text-center text-3xl text-white">Editar Menu</h1>
        <div class="mb-4">
            <label for="nombre" class="block font-bold text-2xl text-white">Nombre:</label>
            <input type="text" id="nombre" wire:model.defer="nombre" required class="w-full px-3 py-2 border rounded">
            @error('nombre') 
                <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="descripcion" class="block font-bold text-white text-2xl">Descripción:</label>
            <textarea id="descripcion" wire:model.defer="descripcion" required class="w-full px-3 py-2 border rounded"></textarea>
            @error('descripcion') 
                <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">
                    {{ $message }}
                </span> 
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="precio" class="block font-bold text-white text-2xl">Precio:</label>
            <input type="number" id="precio" wire:model.defer="precio" required class="w-full px-3 py-2 border rounded">
            @error('precio')
            
                <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="categoria" class="block font-bold text-white text-2xl">Categoría:</label>
            <select id="categoria" wire:model.defer="categoria_id" required class="w-full px-3 py-2 border rounded">
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            @error('categoria_id') 
                <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="imagen" class="block font-bold text-white text-2xl">Imagen:</label>
            <input type="file" id="imagen" wire:model.defer="imagen" class="w-full text-white">
            
            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="Vista previa de la imagen" class="mt-2 w-40 h-auto">
            @else
                @if ($menu->image)
                    <img src="{{ Storage::url('menus/' . $menu->image) }}" alt="Imagen actual" class="mt-2 w-40 h-auto">
                @endif
            @endif
            
            @error('imagen') 
                <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Actualizar menú</button>
        </div>
    </form>
</div>