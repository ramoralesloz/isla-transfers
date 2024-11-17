@extends('layouts.app')

@section('title', 'Detalle de la Reserva')

@section('content')

Detalle de la Reserva


Localizador: {{ $reserva->localizador }}
Hotel: {{ $reserva->id_hotel }}
Tipo de Reserva: {{ $reserva->id_tipo_reserva }}
Email Cliente: {{ $reserva->email_cliente }}
Fecha de Reserva: {{ $reserva->fecha_reserva }}
Fecha de Modificación: {{ $reserva->fecha_modificacion }}
Destino: {{ $reserva->id_destino }}
Fecha de Entrada: {{ $reserva->fecha_entrada }}
Hora de Entrada: {{ $reserva->hora_entrada }}
Origen del Vuelo: {{ $reserva->origen_vuelo_entrada }}
Número de Vuelo: {{ $reserva->numero_vuelo }}
Fecha de Vuelo de Salida: {{ $reserva->fecha_vuelo_salida }}
Hora del Vuelo de Salida: {{ $reserva->hora_vuelo_salida }}
Hora de Recogida: {{ $reserva->hora_recogida }}
Número de Viajeros: {{ $reserva->num_viajeros }}
Vehículo: {{ $reserva->id_vehiculo }}


<div class="acciones mt-4">
    <a href="{{ route('reserva.mostrarModificar', ['id' => $reserva->id_reserva]) }}" class="btn btn-warning">Modificar Reserva</a>
    <a href="{{ route('reserva.listar') }}" class="btn btn-secondary">Volver al Calendario</a>
</div>

@endsection

@section('styles')
@parent

@endsection
