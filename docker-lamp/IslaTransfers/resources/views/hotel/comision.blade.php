@extends('layouts.app')

@section('title', 'Comisiones del Hotel')

@section('content')
    <header class="hotel-header">
        <h1>Comisiones Generadas</h1>
    </header>

    <main>
        <section class="hotel-section">
            <h2>Detalles de Comisión por Mes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mes</th>
                        <th>ID del Hotel</th>
                        <th>Comisión (%)</th>
                        <th>Número de Reservas</th>
                        <th>Total Comisión Generada (€)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comisionesPorMes as $mes => $datos)
                        <tr>
                            <td>{{ $mes }}</td>
                            <td>{{ $hotel->id_hotel }}</td> <!-- Mostrar el ID del hotel -->
                            <td>{{ $hotel->comision }}%</td>
                            <td>{{ $datos['num_reservas'] }}</td> <!-- Mostrar el número de reservas -->
                            <td>{{ number_format($datos['total_comision'], 2) }} €</td> <!-- Mostrar la comisión total -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection

