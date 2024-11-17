@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="login-container">
        <form action="{{ route('cliente.login') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
@endsection
