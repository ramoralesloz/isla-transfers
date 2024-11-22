@extends('layouts.app')

@section('title', 'Administrador - Home')

@section('content')
<header class="admin-header">
    <h1>Bienvenido, Administrador</h1>
</header>

<main class="container">
    <div class="row gy-4">
        <div class="col-md-4">
            <div class="admin-card">
                <h2>Crear Reservas</h2>
                <p>Gestiona todas las reservas realizadas, incluyendo su modificación y cancelación.</p>
                <a href="{{ route('reserva.crear') }}" class="btn btn-custom">Crear Reservas</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="admin-card">
                <h2>Listado de Reservas</h2>
                <p>Consulta las reservas de la semana, el mes o el día. Revisa trayectos en formato de calendario.</p>
                <a href="{{ route('reserva.calendario') }}" class="btn btn-custom">Ver Calendario de Reservas</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="admin-card">
                <h2>Agregar Nuevo Hotel</h2>
                <p>Agrega nuevos hoteles al sistema para que los clientes puedan reservar transfers desde o hacia ellos.</p>
                <a href="{{ route('hotel.registrar') }}" class="btn btn-custom">Agregar Hotel</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="admin-card">
                <h2>Ver Comisiones de Hoteles</h2>
                <p>Consulta las comisiones generadas por cada hotel de manera mensual y acumulada.</p>
                <a href="{{ route('hotel.comisiones') }}" class="btn btn-custom">Ver Comisiones</a>
            </div>
        </div>
    </div>
</main>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">
    <style>
        body {
            background-color: #f0f8ff;
        }

        .admin-header {
            background-color: #007bff;
            color: #fff;
            padding: 1.5em;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 2em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-card {
            background-color: #fff;
            padding: 1.5em;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .admin-card h2 {
            margin-bottom: 1em;
            color: #333;
        }

        .admin-card p {
            margin-bottom: 1.5em;
            color: #666;
        }

        .btn-custom {
            padding: 0.8em 1.5em;
            color: #fff;
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #0056b3, #003f8a);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            color: #f0f8ff;
        }
    </style>
@endsection
