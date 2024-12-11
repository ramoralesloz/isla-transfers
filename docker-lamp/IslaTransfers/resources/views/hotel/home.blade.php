@extends('layouts.layout')

@section('title', 'Home del Hotel')

@section('content')
    <header class="hotel-header text-center mb-4">
        <h1>Bienvenido al Panel del Hotel</h1>
        <p class="lead">Has iniciado sesión exitosamente como hotel.</p>
    </header>

    <main>
        <div class="hotel-menu">
            <div class="hotel-card">
                <div class="hotel-menu-item">
                    <h2><i class="fas fa-plus-circle"></i> Realizar Nueva Reserva</h2>
                    <p>Desde aquí puedes realizar una nueva reserva de transfer para tus huéspedes.</p>
                    <a href="{{ route('hotel.reserva.crear') }}" class="btn btn-custom"><i class="fas fa-plus-circle"></i> Nueva Reserva</a>
                </div>
            </div>

            <div class="hotel-card">
                <div class="hotel-menu-item">
                    <h2><i class="fas fa-chart-bar"></i> Ver Comisiones Mensuales</h2>
                    <p>Consulta las comisiones generadas cada mes por los transfers realizados.</p>
                    <a href="{{ route('hotel.comision') }}" class="btn btn-custom"><i class="fas fa-chart-bar"></i> Ver Comisiones</a>
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

        .hotel-header {
            color: #ffffff; 
            font-weight: bold;
            background-color: #007bff;
            padding: 1.5em;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .hotel-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2em;
            padding: 1em;
        }

        .hotel-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 2em;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .hotel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 24px rgba(0, 0, 0, 0.2);
        }

        .hotel-menu-item h2 {
            color: #007bff;
            font-size: 1.75em;
            margin-bottom: 1em;
        }

        .hotel-menu-item p {
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
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #0056b3, #003f8a);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            color: #f0f8ff;
        }
    </style>
@endsection

