@extends('layouts.app')

@section('title', 'Cliente Particular - Home')

@section('header_title', 'Bienvenido, ' . (Auth::user()->nombre ?? 'Cliente'))

@section('content')
    <p>Seleccione una opción para continuar:</p>
    <div class="options">
        <a href="{{ route('reserva.crear') }}"><i class="fas fa-plus-circle"></i> Hacer una Reserva</a>
        <a href="{{ route('reserva.listar') }}"><i class="fas fa-list"></i> Ver mis Reservas</a>
        <a href="{{ route('cliente.perfil') }}"><i class="fas fa-user"></i> Mi Perfil</a>
    </div>
@endsection
