<div>
    <h1 class="text-center font-bold text-3xl mb-10">Crear menu</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="crearMenu" class="max-w-md mx-auto p-6 bg-sky-800 shadow-md rounded-lg">
        <div class="mb-4">
            <label for="nombre" class="block font-bold text-2xl text-white">Nombre:</label>
            <input 
                type="text" 
                class="form-input mt-1 block w-full p-2 rounded-lg  border-blue-500 focus:ring-blue-500" 
                placeholder="Ej: Jugo de naranja" 
                wire:model="nombre"
            >
            @error('nombre') <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">{{ $message }}</span> @enderror
        </div>
    
        <div class="mb-4">
            <label for="descripcion" class="block font-bold text-2xl text-white">Descripción:</label>
            <textarea class="form-textarea mt-1 block w-full border-blue-500 focus:ring-blue-500" rows="4" wire:model="descripcion"></textarea>
            @error('descripcion') <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="imagen" class="block font-bold text-2xl text-white">Imagen:</label>
            <input type="file" class="form-input mt-1 block w-full text-white" wire:model="imagen" accept='image/*'>
            @error('imagen') 
            <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">
                {{ $message }}
            </span> 
            @enderror
        </div>
    
        <div class="mb-4">
            <label for="precio" class="block font-bold text-2xl text-white">Precio:</label>
            <input 
                type="number" 
                class="form-input p-2 rounded-lg mt-1 block w-full  focus:border-blue-500 focus:ring-blue-500" 
                wire:model="precio"
                placeholder="Ej: 100"
            >
            @error('precio') <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">{{ $message }}</span> @enderror
        </div>
    
        <div class="mb-4">
            <label for="categoria" class="block font-bold text-2xl text-white">Categoría:</label>
            <select wire:model="categoria_id" class="p-2 rounded-lg mt-1 block w-full border-blue-500 focus:ring-blue-500 bg-white text-gray-700 font-bold text-lg">
                <option value="" disabled selected hidden>Seleccione una Categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id') <span class="text-white bg-red-600 rounded-lg p-1 mt-1 uppercase block text-center w-full">{{ $message }}</span>  @enderror
        </div>
    
        <button type="submit" class="bg-green-600 w-full hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear Menú</button>
    </form>
</div>