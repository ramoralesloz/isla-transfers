<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaApiController extends Controller
{
    /**
     * Obtener un JSON con el listado de las reservas realizadas por zonas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtenerReservasPorZona()
    {
        // Consulta para obtener el número de reservas por zona
        $reservasPorZona = DB::table('transfer_reservas')
            ->join('tranfer_hotel', 'transfer_reservas.id_destino', '=', 'tranfer_hotel.id_hotel')
            ->join('transfer_zona', 'tranfer_hotel.id_zona', '=', 'transfer_zona.id_zona')
            ->select('transfer_zona.descripcion as zona', DB::raw('COUNT(transfer_reservas.id_reserva) as total_reservas'))
            ->groupBy('transfer_zona.descripcion')
            ->get();

        // Calcular el total de reservas
        $totalReservas = $reservasPorZona->sum('total_reservas');

        // Calcular el porcentaje de cada zona
        $reservasPorZona->transform(function ($zona) use ($totalReservas) {
            $zona->porcentaje = $totalReservas > 0 ? round(($zona->total_reservas / $totalReservas) * 100, 2) : 0;
            return $zona;
        });

        // Devolver el resultado como JSON
        return response()->json($reservasPorZona);
    }
}

// Ruta para acceder al WebService
// Puedes definir esta ruta en el archivo de rutas (web.php o api.php) dependiendo de tus necesidades
// Route::get('/api/reservas/zonas', [ReservaApiController::class, 'obtenerReservasPorZona']);
