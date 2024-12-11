@extends('layouts.layout')

@section('title', 'Cliente Particular - Home')

@section('header_title', 'Bienvenido, ' . (Auth::user()->nombre ?? 'Cliente'))

@section('content')
    <header class="cliente-header text-center mb-4">
        <h1>Bienvenido al Panel del Cliente Particular</h1>
        <p class="lead">Seleccione una opción para continuar:</p>
    </header>

    <main>
        <div class="cliente-options">
            <div class="cliente-card">
                <div class="cliente-menu-item">
                    <h2><i class="fas fa-plus-circle"></i> Hacer una Reserva</h2>
                    <p>Realiza una nueva reserva de transfer para ti o para tus familiares.</p>
                    <a href="{{ route('reserva.crear') }}" class="btn btn-custom"><i class="fas fa-plus-circle"></i> Nueva Reserva</a>
                </div>
            </div>

            <div class="cliente-card">
                <div class="cliente-menu-item">
                    <h2><i class="fas fa-list"></i> Ver mis Reservas</h2>
                    <p>Consulta el historial de todas tus reservas y su estado.</p>
                    <a href="{{ route('reserva.listar') }}" class="btn btn-custom"><i class="fas fa-list"></i> Ver Reservas</a>
                </div>
            </div>

            <div class="cliente-card">
                <div class="cliente-menu-item">
                    <h2><i class="fas fa-user"></i> Mi Perfil</h2>
                    <p>Actualiza tu información personal y los datos de tu cuenta.</p>
                    <a href="{{ route('cliente.perfil') }}" class="btn btn-custom"><i class="fas fa-user"></i> Mi Perfil</a>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('styles')
    @parent
    <style>
        body {
            background-color: #f0f8ff;
        }

        .cliente-header {
            color: #ffffff;
            font-weight: bold;
        }

        .cliente-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2em;
            padding: 1em;
        }

        .cliente-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 2em;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .cliente-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 24px rgba(0, 0, 0, 0.2);
        }

        .cliente-menu-item h2 {
            color: #007bff;
            font-size: 1.75em;
            margin-bottom: 1em;
        }

        .cliente-menu-item p {
            font-size: 1em;
            color: #333;
            margin-bottom: 1.5em;
        }

        .btn-custom {
            display: inline-block;
            padding: 0.8em 1.5em;
            color: #ffffff;
            background: linear-gradient(45deg, #007bff, #0056b3);
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #0056b3, #003f8a);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            color: #f0f8ff;
        }
    </style>
@endsection
