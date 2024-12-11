@extends('layouts.layout')

@section('title', 'Modificar Reserva')

@section('header_title')
    Modificar Reserva - {{ $reserva->localizador }}
@endsection

@section('content')
<div class="container">
    <form action="{{ route('reserva.modificar', ['id' => $reserva->id_reserva]) }}" method="POST">
        @csrf
        <input type="hidden" name="id_reserva" value="{{ $reserva->id_reserva }}">

        <div class="form-group">
            <label for="fecha_entrada">Fecha de Entrada:</label>
            <input type="date" id="fecha_entrada" name="fecha_entrada" class="form-control" value="{{ old('fecha_entrada', $reserva->fecha_entrada) }}" required>
        </div>

        <div class="form-group">
            <label for="hora_entrada">Hora de Entrada:</label>
            <input type="time" id="hora_entrada" name="hora_entrada" class="form-control" value="{{ old('hora_entrada', $reserva->hora_entrada) }}">
        </div>

        <div class="form-group">
            <label for="origen_vuelo_entrada">Origen del Vuelo:</label>
            <input type="text" id="origen_vuelo_entrada" name="origen_vuelo_entrada" class="form-control" value="{{ old('origen_vuelo_entrada', $reserva->origen_vuelo_entrada) }}">
        </div>

        <div class="form-group">
            <label for="fecha_vuelo_salida">Fecha de Vuelo de Salida:</label>
            <input type="date" id="fecha_vuelo_salida" name="fecha_vuelo_salida" class="form-control" value="{{ old('fecha_vuelo_salida', $reserva->fecha_vuelo_salida) }}">
        </div>

        <div class="form-group">
            <label for="hora_vuelo_salida">Hora del Vuelo de Salida:</label>
            <input type="time" id="hora_vuelo_salida" name="hora_vuelo_salida" class="form-control" value="{{ old('hora_vuelo_salida', $reserva->hora_vuelo_salida) }}">
        </div>

        <div class="form-group">
            <label for="hora_recogida">Hora de Recogida:</label>
            <input type="time" id="hora_recogida" name="hora_recogida" class="form-control" value="{{ old('hora_recogida', $reserva->hora_recogida) }}">
        </div>

        <div class="form-group">
            <label for="num_viajeros">Número de Viajeros:</label>
            <input type="number" id="num_viajeros" name="num_viajeros" class="form-control" value="{{ old('num_viajeros', $reserva->num_viajeros) }}" required>
        </div>

        <div class="form-group">
            <label for="id_vehiculo">Número Vehículo:</label>
            <input type="number" id="id_vehiculo" name="id_vehiculo" class="form-control" value="{{ old('id_vehiculo', $reserva->id_vehiculo) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
    <div class="mt-3">
        <a href="{{ route('cliente.home') }}" class="btn btn-secondary">Volver al Menú del Usuario</a>
    </div>
</div>
@endsection
