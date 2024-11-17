@extends('layouts.app')

@section('title', 'Administrador - Home')

@section('content')
    <header class="admin-header">
        <h1>Bienvenido, Administrador</h1>
        <nav>
            <ul>
                <li><a href="{{ route('reserva.crear') }}"><i class="fas fa-tasks"></i> Crear Reservas</a></li>
                <li><a href="{{ route('reserva.calendario') }}"><i class="fas fa-calendar-alt"></i> Listado Reservas</a></li>
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
            <a href="{{ route('reserva.calendario') }}" class="button"><i class="fas fa-calendar-alt"></i> Ver Calendario de Reservas</a>
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
    @parent
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">
@endsection

