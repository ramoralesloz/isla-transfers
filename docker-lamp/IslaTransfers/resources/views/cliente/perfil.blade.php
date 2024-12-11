@extends('layouts.layout')

@section('title', 'Perfil del Cliente')

@section('content')
    <div class="profile-container">
        <h2 class="profile-title">Perfil del Cliente</h2>

        <div class="profile-info mb-4">
            <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
            <p><strong>Email:</strong> {{ $cliente->email }}</p>
        </div>

        <div class="profile-form-container">
            <h3 class="profile-subtitle">Modificar Datos</h3>
            <form action="{{ route('cliente.modificar') }}" method="POST">
                @csrf
                <input type="hidden" name="id_cliente" value="{{ $cliente->id_viajero }}">

                <div class="form-group mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $cliente->nombre }}" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $cliente->email }}" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="password">Contraseña (dejar en blanco para no cambiar)</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-custom">Actualizar Datos</button>
            </form>
        </div>
    </div>

    <div class="volver-menu mt-4">
        <a href="{{ route('cliente.home') }}" class="btn btn-secondary">Volver al Menú del Usuario</a>
    </div>
@endsection

@section('styles')
    @parent
    <style>
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2em;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .profile-title {
            color: #007bff;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5em;
        }

        .profile-info {
            background-color: #f8f9fa;
            padding: 1em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .profile-form-container {
            margin-top: 2em;
        }

        .profile-subtitle {
            color: #007bff;
            margin-bottom: 1em;
        }

        .form-group label {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 0.5em;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 0.8em;
            margin-bottom: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .btn-custom {
            display: inline-block;
            padding: 0.8em 2em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .volver-menu a {
            text-decoration: none;
            color: #fff;
        }
    </style>
@endsection

