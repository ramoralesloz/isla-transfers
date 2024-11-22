@extends('layouts.app')

@section('title', 'Crear Reserva - Hotel')

@section('content')
<div class="container">
    <header>
        <h1>Crear Nueva Reserva Hotel</h1>
    </header>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form id="reservaHotelForm" action="{{ route('hotel.reserva.guardar') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tipo_trayecto">Tipo de Trayecto:</label>
            <select id="tipo_trayecto" name="id_tipo_reserva" class="form-control" required>
                <option value="1">Aeropuerto a Hotel</option>
                <option value="2">Hotel a Aeropuerto</option>
                <option value="3">Ida y Vuelta</option>
            </select>
        </div>

        <!-- Campos para el trayecto de aeropuerto a hotel -->
        <div id="aeropuerto_hotel_fields" class="optional-fields">
            <div class="form-group">
                <label for="fecha_entrada">Fecha de Llegada:</label>
                <input type="date" id="fecha_entrada" name="fecha_entrada" class="form-control">
            </div>

            <div class="form-group">
                <label for="hora_entrada">Hora de Llegada:</label>
                <input type="time" id="hora_entrada" name="hora_entrada" class="form-control">
            </div>

            <div class="form-group">
                <label for="origen_vuelo_entrada">Origen del Vuelo:</label>
                <input type="text" id="origen_vuelo_entrada" name="origen_vuelo_entrada" class="form-control">
            </div>
        </div>

        <!-- Campos para el trayecto de hotel a aeropuerto -->
        <div id="hotel_aeropuerto_fields" class="optional-fields">
            <div class="form-group">
                <label for="fecha_vuelo_salida">Fecha del Vuelo de Salida:</label>
                <input type="date" id="fecha_vuelo_salida" name="fecha_vuelo_salida" class="form-control">
            </div>

            <div class="form-group">
                <label for="hora_vuelo_salida">Hora del Vuelo de Salida:</label>
                <input type="time" id="hora_vuelo_salida" name="hora_vuelo_salida" class="form-control">
            </div>

            <div class="form-group">
                <label for="hora_recogida">Hora de Recogida en el Hotel:</label>
                <input type="time" id="hora_recogida" name="hora_recogida" class="form-control">
            </div>
        </div>

        <!-- Campos comunes -->
        <div class="form-group">
            <label for="email_cliente">Correo Electrónico del Cliente:</label>
            <input type="email" id="email_cliente" name="email_cliente" class="form-control" value="{{ old('email_cliente') }}" required>
        </div>

        <div class="form-group">
            <label for="num_viajeros">Número de Viajeros:</label>
            <input type="number" id="num_viajeros" name="num_viajeros" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numero_vuelo">Número de Vuelo:</label>
            <input type="text" id="numero_vuelo" name="numero_vuelo" class="form-control">
        </div>

        <div class="form-group">
            <label for="id_vehiculo">Número de Vehículo:</label>
            <input type="number" id="id_vehiculo" name="id_vehiculo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Reserva</button>
    </form>


    <div class="volver-menu mt-4">
        <a href="{{ route('hotel.home') }}" class="btn btn-secondary">
            Volver al Menú del Hotel
        </a>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipoTrayectoSelect = document.getElementById('tipo_trayecto');
            const aeropuertoHotelFields = document.getElementById('aeropuerto_hotel_fields');
            const hotelAeropuertoFields = document.getElementById('hotel_aeropuerto_fields');

            function toggleFields() {
                const tipoTrayecto = tipoTrayectoSelect.value;

                // Mostrar/Ocultar campos según el trayecto seleccionado
                aeropuertoHotelFields.style.display = tipoTrayecto === '1' || tipoTrayecto === '3' ? 'block' : 'none';
                hotelAeropuertoFields.style.display = tipoTrayecto === '2' || tipoTrayecto === '3' ? 'block' : 'none';

                // Remover 'required' de todos los campos y añadir solo si están visibles
                document.querySelectorAll('#aeropuerto_hotel_fields input, #hotel_aeropuerto_fields input').forEach(function (input) {
                    input.required = input.closest('div').style.display === 'block';
                });
            }

            tipoTrayectoSelect.addEventListener('change', toggleFields);
            toggleFields(); // Inicializa la visibilidad de los campos según el valor por defecto
        });
    </script>
@endsection