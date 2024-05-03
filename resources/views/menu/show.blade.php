@extends('layouts.app')

@section('titulo')
    {{ $menu->nombre }}
@endsection

@section('contenido')
<section class="container mt-10 grid grid-cols-1 md:grid-cols-12 gap-4">
    <div class="col-span-8 md:col-span-8 flex flex-col items-center">
        <h1 class="text-3xl text-center">{{ $menu->nombre }}</h1>
        <img src="{{ asset('storage/menus/' . $menu->image) }}" alt="{{ $menu->nombre }}" class=" mb-4 w-full md:w-96 rounded-lg">

        <p class="text-center">{{ $menu->descripcion }}</p>
    </div>

    <div class="col-span-4 md:col-span-4">
        <h2 class="text-3xl text-center">Reseñas</h2>
        <form class="w-full max-w-sm" method="POST" action="{{route('resena.store', $menu)}}">
            @csrf
            <label for="resena" class="block">Escribe una reseña</label>
            <textarea 
                id="resena" 
                name="review" 
                class="border border-gray-300 rounded-md px-4 py-2 w-full"
                placeholder="Ej. Me encanto el menu"
            ></textarea>
            @error('review')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
            @if(session('success'))
                <p class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ session('success') }}
                </p>
            @endif
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mt-4">Enviar</button>
           
        </form>
    </div>
</section>
    
@endsection