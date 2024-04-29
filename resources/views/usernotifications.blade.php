
@extends('layouts.app')


@section('titulo')
    Notificaciones

@endsection


@section('contenido')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Notificaciones</h1>

    <ul>
        @forelse ($notifications as $notification)
            <li class="bg-white rounded-md shadow-md p-4 mb-4 flex justify-between items-center">
                <div>
                    <strong class="text-lg">{{ $notification->data['message'] }}</strong>
                    <p class="text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
                </div>
                <div>
                    <a href="{{ $notification->data['url'] }}" class="bg-green-600 text-white px-4 py-2 rounded">
                        Ver Pedidos
                    </a>
                </div>
            </li>
        @empty
            <li class="text-gray-500">No tienes notificaciones.</li>
        @endforelse
    </ul>
</div>
@endsection