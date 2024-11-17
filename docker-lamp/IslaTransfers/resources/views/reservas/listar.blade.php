@extends('layouts.app')

@section('title', 'Listar Reservas')

@section('header_title', 'Lista de Reservas')

@section('content')
<div class="reservas">
    @if ($reservas->isNotEmpty())
        @foreach ($reservas as $reserva)
            <!-- Mostrar solo las reservas del cliente autenticado -->
            @if (auth()->user()->email === $reserva->email_cliente)
                <div class="reserva">
                    <h3>Reserva: {{ $reserva->localizador }}</h3>
                    <p><strong>Hotel:</strong> {{ $reserva->id_hotel }}</p>
                    <p><strong>Fecha de Reserva:</strong> {{ $reserva->fecha_reserva }}</p>
                    <p><strong>Fecha de Modificación:</strong> {{ $reserva->fecha_modificacion }}</p>
                    <p><strong>Fecha de Entrada:</strong> {{ $reserva->fecha_entrada ?? '' }} {{ $reserva->hora_entrada ?? '' }}</p>
                    <p><strong>Origen del Vuelo:</strong> {{ $reserva->origen_vuelo_entrada ?? '' }}</p>
                    <p><strong>Fecha de Vuelo de Salida:</strong> {{ $reserva->fecha_vuelo_salida ?? '' }}</p>
                    <p><strong>Hora del Vuelo de Salida:</strong> {{ $reserva->hora_vuelo_salida ?? '' }}</p>
                    <p><strong>Hora de Recogida:</strong> {{ $reserva->hora_recogida ?? '' }}</p>
                    <p><strong>Número de Viajeros:</strong> {{ $reserva->num_viajeros }}</p>
                    <p><strong>Vehículo:</strong> {{ $reserva->id_vehiculo }}</p>
                    <p><strong>Número de Vuelo:</strong> {{ $reserva->numero_vuelo }}</p>

                    <!-- Botón de Cancelar con verificación de 48 horas -->
                    @if (auth()->user()->tipo_cliente === 'administrador' || $reserva->cancelable)
                        <a href="{{ route('reserva.eliminar', $reserva->id_reserva) }}">
                            <button>Cancelar Reserva</button>
                        </a>
                        <a href="{{ route('reserva.mostrarModificar', $reserva->id_reserva) }}">
                            <button>Modificar Reserva</button>
                        </a>
                    @else
                        <button disabled>Cancelar no disponible (menos de 48 horas)</button>
                        <button disabled>Modificar no disponible (menos de 48 horas)</button>
                    @endif
                </div>
            @endif
        @endforeach
    @else
        <p>No hay reservas disponibles.</p>
    @endif
</div>

<div class="volver-menu mt-4">
    <a href="{{ route('cliente.home') }}" class="btn btn-primary">Volver al Menú del Usuario</a>
</div>
@endsection
