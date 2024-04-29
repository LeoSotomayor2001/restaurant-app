@extends('layouts.app')

@section('titulo')
    Inicio
@endsection

@section('contenido')
@if (session()->has('error'))
        <div class="bg-red-500 text-white px-4 py-2 mb-4">
            {{ session('error') }}
        </div>
@endif
<livewire:menu-search />
@endsection