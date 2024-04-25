@extends('layouts.admin')

@section('titulo')
    Editar Menu

@endsection

@section('contenido')

@livewire('menu-edit', ['menu' => $menu])

@endSection