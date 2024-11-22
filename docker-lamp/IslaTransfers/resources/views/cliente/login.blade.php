@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('styles')
<style>
    .login-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 2em;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .login-container form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .login-container label {
        font-weight: bold;
        color: #007bff;
        margin-bottom: 0.5em;
        align-self: flex-start;
    }

    .login-container input {
        width: 100%;
        padding: 0.8em;
        margin-bottom: 1.5em;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        transition: border-color 0.3s;
    }

    .login-container input:focus {
        outline: none;
        border-color: #007bff;
    }

    .login-container button {
        padding: 0.8em 2em;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .login-container button:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .login-container h2 {
        color: #007bff;
        margin-bottom: 1em;
    }
</style>
@endsection

@section('content')
    <div class="login-container">
        <h2><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</h2>
        <form action="{{ route('cliente.login') }}" method="POST">
            @csrf

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Introduce tu correo" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
@endsection
