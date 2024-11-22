@extends('layouts.app')

@section('title', 'Home del Hotel')

@section('content')
    <div class="container">
        <h1>Bienvenido al Panel del Hotel</h1>
        <p>Has iniciado sesión exitosamente como hotel.</p>

        <nav class="hotel-menu">
            <ul>
                <li><a href="{{ route('hotel.reserva.crear') }}"><i class="fas fa-plus-circle"></i> Realizar Nueva Reserva</a></li>
                <li><a href="{{ route('hotel.comision') }}"><i class="fas fa-chart-bar"></i> Ver Comisiones Mensuales</a></li>
            </ul>
        </nav>

        <a href="{{ route('hotel.logout') }}" class="btn btn-danger">Cerrar Sesión</a>
    </div>
@endsection

@section('styles')
    @parent
    <style>
        .hotel-menu ul {
            list-style: none;
            padding: 0;
        }
        .hotel-menu ul li {
            margin-bottom: 1em;
        }
        .hotel-menu ul li a {
            text-decoration: none;
            font-weight: bold;
            color: #007bff;
        }
    </style>
@endsection
