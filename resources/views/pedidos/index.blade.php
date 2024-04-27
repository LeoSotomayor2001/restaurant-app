@extends('layouts.app')

@section('titulo')
    Pedidos
@endsection

@section('contenido')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse ($pedidos as $pedido)
    <div class="flex flex-col justify-between bg-white rounded-lg shadow-lg p-4 border border-gray-200">
        <h2 class="text-xl font-bold mb-2">Nombre: {{ $pedido->description }}</h2>
        <p class="font-bold text-green-500 text-lg mb-2">Precio: {{ $pedido->monto_total }} Bs.</p>
        <p class="font-bold text-sky-500 text-lg mb-2">Estado: {{ $pedido->estado }}</p>
        <p class="text-gray-500 text-sm">{{ $pedido->created_at->diffForHumans() }}</p>
    </div>
    @empty
    <p class="text-center text-2xl">No tienes pedidos activos</p>
    @endforelse
</div>
@endsection


