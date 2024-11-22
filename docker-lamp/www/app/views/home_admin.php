@extends('layouts.app')

@section('title', 'Administrador - Home')

@section('content')
    <header class="admin-header">
        <h1>Bienvenido, Administrador</h1>
        <nav>
            <ul>
                <li><a href="{{ route('reserva.crear') }}"><i class="fas fa-tasks"></i> Crear Reservas</a></li>
                <li><a href="{{ route('reserva.listar') }}"><i class="fas fa-calendar-alt"></i> Listado Reservas</a></li>
                <li><a href="{{ route('vehiculo.listar') }}"><i class="fas fa-car"></i> Ver Vehículos</a></li>
                <li><a href="{{ route('hotel.registrar') }}"><i class="fas fa-hotel"></i> Agregar Nuevo Hotel</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="Crear-reservas" class="admin-section">
            <h2>Crear Reservas</h2>
            <p>Desde aquí puedes gestionar todas las reservas realizadas, incluyendo su modificación y cancelación.</p>
            <a href="{{ route('reserva.crear') }}" class="button"><i class="fas fa-tasks"></i> Crear Reservas</a>
        </section>

        <section id="listar-reservas" class="admin-section">
            <h2>Listado Reservas</h2>
            <p>El administrador podrá consultar una vista por semana, por día y por mes de los trayectos que han de realizar. Los trayectos se deben mostrar en formato calendario. Cuando se accede a un trayecto se muestra la información detallada con todos los campos entrados.</p>
            <a href="{{ route('reserva.listar') }}" class="button"><i class="fas fa-calendar-alt"></i> Ver Calendario de Reservas</a>
        </section>

        <section id="ver-vehiculos" class="admin-section">
            <h2>Agregar Vehículos</h2>
            <p>Consulta y gestiona los vehículos disponibles para los transfers.</p>
            <a href="{{ route('vehiculo.listar') }}" class="button"><i class="fas fa-car"></i> Agregar Vehículos</a>
        </section>

        <section id="agregar-hotel" class="admin-section">
            <h2>Agregar Nuevo Hotel</h2>
            <p>Agrega nuevos hoteles al sistema para que los clientes puedan reservar transfers desde o hacia ellos.</p>
            <a href="{{ route('hotel.registrar') }}" class="button"><i class="fas fa-hotel"></i> Agregar Hotel</a>
        </section>
    </main>
@endsection

@section('styles')
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .admin-header {
            background-color: #007bff;
            color: #fff;
            padding: 1.5em;
            text-align: center;
            border-radius: 10px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 1em;
            margin-top: 1em;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 0.5em 1em;
            background-color: #0056b3;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #003f8a;
        }

        main {
            padding: 2em;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2em;
            align-items: start;
        }

        .admin-section {
            background-color: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .admin-section h2 {
            font-size: 1.5em;
            margin-bottom: 1em;
            border-bottom: 2px solid #007bff;
            padding-bottom: 0.5em;
        }

        .button {
            display: inline-block;
            margin-top: 1em;
            padding: 0.8em 1.5em;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

