@extends('layouts.app')

@section('title', 'Comisiones del Hotel')

@section('content')
    <header class="hotel-header text-center mb-4">
        <h1>Comisiones Generadas</h1>
    </header>

    <main>
        <section class="hotel-section">
            <h2 class="text-primary text-center mb-4">Detalles de Comisión por Mes</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
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
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $mes)->format('F Y') }}</td>
                                <td>{{ $hotel->id_hotel }}</td>
                                <td>{{ $hotel->comision }}%</td>
                                <td>{{ $datos['num_reservas'] }}</td>
                                <td>{{ number_format($datos['total_comision'], 2) }} €</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
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

        .hotel-section {
            background-color: #ffffff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 2em;
        }

        h2 {
            font-size: 1.75em;
        }

        .table {
            margin-bottom: 0;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 1em;
            text-align: center;
        }

        .table-primary {
            background-color: #007bff;
            color: #ffffff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #ddd;
        }

        .table-responsive {
            overflow-x: auto;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            padding: 1em;
            background-color: #f8f9fa;
        }
    </style>
@endsection
