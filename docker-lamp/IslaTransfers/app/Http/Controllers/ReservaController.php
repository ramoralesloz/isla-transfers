<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
class ReservaController extends Controller
{
    // Mostrar el formulario de crear reserva
    public function mostrarCrear()
    {
        return view('reservas.crear');
    }

    // Guardar la reserva en la base de datos
    public function guardarReserva(Request $request)
    {
        $request->validate([
            'id_tipo_reserva' => 'required|integer',
            'email_cliente' => 'required|email',
            'fecha_entrada' => 'nullable|date',
            'hora_entrada' => 'nullable',
            'numero_vuelo' => 'nullable|string',
            'origen_vuelo_entrada' => 'nullable|string',
            'fecha_vuelo_salida' => 'nullable|date',
            'hora_vuelo_salida' => 'nullable',
            'hora_recogida' => 'nullable',
            'num_viajeros' => 'required|integer',
            'id_vehiculo' => 'required|integer',
            'id_destino' => 'required|integer',
        ]);

        $reserva = new Reserva();
        $reserva->localizador = uniqid('RES-', true);
        $reserva->id_hotel = $request->id_hotel;
        $reserva->id_tipo_reserva = $request->id_tipo_reserva;
        $reserva->email_cliente = $request->email_cliente;
        $reserva->fecha_reserva = now();
        $reserva->fecha_modificacion = now();
        $reserva->id_destino = $request->id_destino;
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->hora_entrada = $request->hora_entrada;
        $reserva->numero_vuelo = $request->numero_vuelo;
        $reserva->origen_vuelo_entrada = $request->origen_vuelo_entrada;
        $reserva->fecha_vuelo_salida = $request->fecha_vuelo_salida;
        $reserva->hora_vuelo_salida = $request->hora_vuelo_salida;
        $reserva->hora_recogida = $request->hora_recogida;
        $reserva->num_viajeros = $request->num_viajeros;
        $reserva->id_vehiculo = $request->id_vehiculo;

        if ($reserva->save()) {
            return redirect()->route('reserva.crear')->with('success', 'Reserva creada con éxito.');
        }

        return back()->with('error', 'Error al crear la reserva.');
    }

    public function mostrarModificar($id)
{
    $reserva = Reserva::findOrFail($id);
    return view('reservas.modificar', compact('reserva'));
}

public function modificarReserva(Request $request, $id)
{
    $request->validate([
        'fecha_entrada' => 'nullable|date',
        'hora_entrada' => 'nullable',
        'origen_vuelo_entrada' => 'nullable|string',
        'fecha_vuelo_salida' => 'nullable|date',
        'hora_vuelo_salida' => 'nullable',
        'hora_recogida' => 'nullable',
        'num_viajeros' => 'required|integer',
        'id_vehiculo' => 'required|integer',
    ]);

    $reserva = Reserva::findOrFail($id);
    $reserva->update($request->only([
        'fecha_entrada',
        'hora_entrada',
        'origen_vuelo_entrada',
        'fecha_vuelo_salida',
        'hora_vuelo_salida',
        'hora_recogida',
        'num_viajeros',
        'id_vehiculo',
    ]));

    return redirect()->route('reserva.listar')->with('success', 'Reserva modificada con éxito.');
}
public function listarReservas()
{
    $reservas = Reserva::all();

    // Agregar la lógica para verificar si las reservas son cancelables
    foreach ($reservas as $reserva) {
        $fechaEntrada = new \DateTime($reserva->fecha_entrada . ' ' . ($reserva->hora_entrada ?? '00:00:00'));
        $fechaActual = new \DateTime();
        $intervalo = $fechaActual->diff($fechaEntrada);
        $horasRestantes = ($intervalo->days * 24) + $intervalo->h;

        $reserva->cancelable = $horasRestantes >= 48;
    }

    return view('reservas.listar', compact('reservas'));
}
public function eliminarReserva($id)
{
    try {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect()->route('reserva.listar')->with('success', 'Reserva eliminada con éxito.');
    } catch (\Exception $e) {
        return redirect()->route('reserva.listar')->with('error', 'Error al eliminar la reserva.');
    }
}
public function detalleReserva($id)
{
    $reserva = Reserva::findOrFail($id);
    return view('reservas.detalle', compact('reserva'));
}
public function mostrarCalendario()
{
    $reservas = Reserva::all();
    return view('reservas.calendario', compact('reservas'));
}




}
