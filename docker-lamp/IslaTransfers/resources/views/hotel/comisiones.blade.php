@extends('layouts.layout')

@section('title', 'Comisiones de Hoteles')

@section('content')
<header class="admin-header mb-4">
    <h1>Comisiones Generadas por Hotel</h1>
</header>

<main>
    @foreach($hotelesConComisiones as $hotelData)
    <div class="hotel-section mb-5">
        <div class="hotel-card">
            <h2 class="hotel-name">
                <i class="fas fa-hotel"></i> Comisiones para el Hotel: <strong>{{ $hotelData['hotel']->nombre }}</strong> (ID: {{ $hotelData['hotel']->id_hotel }})
            </h2>
        </div>
        @foreach($hotelData['comisionesPorMes'] as $mes => $data)
        <div class="month-section mb-4">
            <h3 class="month-title"><i class="fas fa-calendar-alt"></i> Mes: {{ \Carbon\Carbon::createFromFormat('Y-m', $mes)->format('F Y') }}</h3>
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
    body {
        background-color: #f0f8ff;
    }

    .admin-header {
        text-align: center;
        margin-bottom: 2em;
        color: #ffffff;
        font-size: 2em;
        font-weight: bold;
        background-color: #007bff;
        padding: 1em;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .hotel-section {
        padding: 1.5em;
        background-color: #f0f8ff;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hotel-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 24px rgba(0, 0, 0, 0.2);
    }

    .hotel-card {
        background-color: #007bff;
        padding: 1em;
        border-radius: 10px;
        color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5em;
    }

    .hotel-name {
        margin: 0;
        font-size: 1.75em;
        color: #ffffff;
    }

    .month-section {
        background: #ffffff;
        padding: 1.5em;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    .month-title {
        font-size: 1.5em;
        margin-bottom: 1em;
        color: #007bff;
        font-weight: bold;
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
        background-color: #0056b3;
        color: #ffffff;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .hotel-section + .hotel-section {
        margin-top: 2em;
    }

    .btn-custom {
        display: inline-block;
        padding: 0.8em 1.5em;
        color: #ffffff;
        background: linear-gradient(45deg, #007bff, #0056b3);
        text-decoration: none;
        border-radius: 8px;
    }

    .btn-custom:hover {
        background: linear-gradient(45deg, #0056b3, #003f8a);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        color: #f0f8ff;
    }
</style>
@endsection
