@extends('layouts.layout')

@section('title', 'Listado de Reservas - Calendario')

@section('content')
<header class="admin-header">
    <h1>Calendario de Reservas</h1>
</header>

<!-- Contenedor del calendario -->
<div id="calendar" class="mt-4"></div>

<div class="volver-menu mt-4">
    <a href="{{ route('admin.home') }}" class="btn btn-primary">Volver al Menú del Administrador</a>
</div>
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
<link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">
@endsection

@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/es.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                @foreach ($reservas as $reserva)
                {
                    title: 'Reserva {{ $reserva->localizador }}',
                    start: '{{ $reserva->fecha_entrada }}T{{ $reserva->hora_entrada ?? "00:00:00" }}',
                    url: '{{ route('reserva.detalle', ['id' => $reserva->id_reserva]) }}'
                },
                @endforeach
            ],
            eventClick: function (info) {
                info.jsEvent.preventDefault();
                if (info.event.url) {
                    window.open(info.event.url, '_blank'); // Abre el enlace en una nueva pestaña
                }
            },
            themeSystem: 'standard',
            aspectRatio: 1.5,
            editable: false,
            selectable: false,
            navLinks: true // Permite hacer clic en las fechas para navegar
        });

        calendar.render();
    });
</script>
@endsection
