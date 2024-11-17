@extends('layouts.app')

@section('title', 'Perfil del Cliente')

@section('content')
    <div class="container">
        <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
        <p><strong>Email:</strong> {{ $cliente->email }}</p>

        <h2>Modificar Datos</h2>
        <form action="{{ route('cliente.modificar') }}" method="POST">
            @csrf
            <input type="hidden" name="id_cliente" value="{{ $cliente->id_viajero }}">

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $cliente->nombre }}" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $cliente->email }}" required>

            <label for="password">Password (dejar en blanco para no cambiar)</label>
            <input type="password" id="password" name="password">

            <button type="submit">Actualizar Datos</button>
        </form>
    </div>
    <div class="volver-menu">
        <a href="{{ route('cliente.home') }}">
            <button>Volver al Menú del Usuario</button>
        </a>
    </div>
@endsection
