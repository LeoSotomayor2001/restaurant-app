@extends('layouts.app')

@section('titulo')
    {{ $menu->nombre }}
@endsection

@section('contenido')
    <div class="container flex flex-col items-center justify-center space-y-5">
        <h1 class="text-3xl text-center">{{ $menu->nombre }}</h1>
        <img src="{{ asset('storage/menus/' . $menu->image) }}" alt="{{ $menu->nombre }}" class="w-96">

        <p>{{ $menu->descripcion }}</p>

    </div>
    
@endsection