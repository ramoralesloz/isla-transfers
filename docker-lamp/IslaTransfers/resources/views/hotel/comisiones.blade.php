@extends('layouts.app')

@section('title', 'Comisiones de Hoteles')

@section('content')
    <header class="admin-header mb-4">
        <h1>Comisiones Generadas por Hotel</h1>
    </header>

    <main>
        @foreach($hotelesConComisiones as $hotelData)
            <div class="hotel-section mb-5">
                <h2 class="hotel-name">
                    Comisiones para el Hotel: <strong>{{ $hotelData['hotel']->nombre }}</strong> (ID: {{ $hotelData['hotel']->id_hotel }})
                </h2>
                @foreach($hotelData['comisionesPorMes'] as $mes => $data)
                    <div class="month-section mb-4">
                        <h3 class="month-title">Mes: {{ \Carbon\Carbon::createFromFormat('Y-m', $mes)->format('F Y') }}</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Número de Reservas</th>
                                    <th>Total Comisión Generada (€)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data['num_reservas'] }}</td>
                                    <td>{{ number_format($data['total_comision'], 2) }} €</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        @endforeach
    </main>
@endsection

@section('styles')
    @parent
    <style>
        .admin-header {
            text-align: center;
            margin-bottom: 2em;
            color: #007bff;
        }

        .hotel-section {
            border: 1px solid #007bff;
            border-radius: 10px;
            padding: 1.5em;
            background-color: #f8f9fa;
        }

        .hotel-name {
            font-size: 1.5em;
            margin-bottom: 1em;
            color: #343a40;
        }

        .month-section {
            background: #ffffff;
            padding: 1em;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .month-title {
            font-size: 1.25em;
            margin-bottom: 1em;
            color: #6c757d;
        }

        .table {
            width: 100%;
            margin-bottom: 1em;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 1em;
            border: 1px solid #ddd;
            text-align: center;
        }

        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .hotel-section + .hotel-section {
            margin-top: 2em;
        }
    </style>
@endsection

