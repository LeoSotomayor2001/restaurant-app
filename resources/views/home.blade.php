@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('contenido')
<div class="container mx-auto py-8">
    <h1 class="text-3xl text-center">Bienvenido al Restaurante </h1>
    
    <div class="mt-10 text-center">
        <p class="text-xl mb-4">¡Descubre la exquisitez de nuestros platos y crea una cuenta para disfrutar de beneficios exclusivos!</p>
        <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-green-500 text-white font-bold rounded hover:bg-green-600 transition duration-200">Crear cuenta</a>
        
    </div>
    
</div>
@endsection