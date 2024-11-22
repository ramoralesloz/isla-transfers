<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\transfer_Zona;
use App\Models\Reserva;
use App\Models\transfer_precios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HotelController extends Controller
{
    // Mostrar el formulario de registro para los hoteles
    public function showRegisterForm()
    {
        return view('hotel.registrar');
    }
    public function mostrarCrearReserva()
    {
        \Log::info('Mostrando formulario para crear una nueva reserva desde el panel del hotel.');
        return view('hotel.reserva');
    } 
    public function guardarReserva(Request $request)
{
    \Log::info('Intentando guardar una reserva para el hotel', [
        'usuario' => Auth::guard('hotel')->user()->usuario
    ]);

    // Validaciones
    $request->validate([
        'id_tipo_reserva' => 'required|integer',
        'num_viajeros' => 'required|integer',
        'id_vehiculo' => 'required|integer',
    ]);

    // Obtener el hotel autenticado desde la sesión
    $hotel = Auth::guard('hotel')->user();
    if (!$hotel) {
        \Log::error('No se encontró el hotel autenticado.');
        return back()->with('error', 'Error al identificar el hotel.');
    }
    

    //$precioFinal = $precioBase + $comision;
    // Crear una nueva reserva
    $reserva = new Reserva();
    $reserva->localizador = uniqid('RES-', true);
    $reserva->id_hotel = $hotel->id_hotel;
    $reserva->id_tipo_reserva = $request->id_tipo_reserva;
    $reserva->email_cliente = $request->email_cliente;  // Permitir al hotel introducir el email del cliente
    $reserva->fecha_reserva = now();
    $reserva->fecha_modificacion = now();
    $reserva->fecha_entrada = $request->fecha_entrada;
    $reserva->hora_entrada = $request->hora_entrada;
    $reserva->numero_vuelo = $request->numero_vuelo;
    $reserva->origen_vuelo_entrada = $request->origen_vuelo_entrada;
    $reserva->fecha_vuelo_salida = $request->fecha_vuelo_salida;
    $reserva->hora_vuelo_salida = $request->hora_vuelo_salida;
    $reserva->hora_recogida = $request->hora_recogida;
    $reserva->num_viajeros = $request->num_viajeros;
    $reserva->id_vehiculo = $request->id_vehiculo;

    // Asignar id_destino al valor del id_hotel por defecto
    $reserva->id_destino = $hotel->id_hotel;

    \Log::info('Datos de la reserva que se intenta guardar:', $reserva->toArray());

    if ($reserva->save()) {
        \Log::info('Reserva creada con éxito:', ['localizador' => $reserva->localizador]);
        return redirect()->route('hotel.reserva.crear')->with('success', 'Reserva creada con éxito.');
    }

    \Log::error('Error al intentar guardar la reserva.');
    return back()->with('error', 'Error al crear la reserva.');
}
    // Manejar el registro de nuevos hoteles
    public function registrarHotel(Request $request)
    {
        $request->validate([
            'id_zona' => 'required|integer',
            'comision' => 'required|numeric',
            'usuario' => 'required|string|unique:tranfer_hotel,usuario',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Crear un nuevo hotel
        Hotel::create($request->all());

        return redirect()->route('admin.home')->with('success', 'Hotel registrado con éxito.');
    }

    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('hotel.login');
    }

  public function login(Request $request)
{
    $credentials = $request->validate([
        'usuario' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::guard('hotel')->attempt(['usuario' => $credentials['usuario'], 'password' => $credentials['password']], true)) {
        $request->session()->regenerate();

        \Log::info('Estado de autenticación después del intento:', [
            'authenticated' => Auth::guard('hotel')->check(),
            'user' => Auth::guard('hotel')->user(),
        ]);

        return redirect()->route('hotel.home')->with('success', 'Inicio de sesión exitoso.');
    }

    return back()->withErrors([
        'usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ]);
} 

    // Manejar el cierre de sesión del hotel
    public function logout(Request $request)
    {
        Auth::guard('hotel')->logout(); // Cerrar la sesión del hotel
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Redirigir a la vista welcome.blade.php
        return redirect()->route('welcome');
    }
    
    public function verComisionesAdmin()
    {
        // Obtener todos los hoteles con sus zonas asociadas
        $hoteles = Hotel::with('zona')->get();
    
        // Obtener el precio base genérico de la tabla transfer_precios
        $precioBase = \DB::table('transfer_precios')
            ->where('id_precios', 1) // Seleccionar el precio genérico (id_precios = 1)
            ->value('Precio');
    
        \Log::info('Precio base obtenido para la comisión del administrador:', ['precioBase' => $precioBase]);
    
        if (!$precioBase) {
            // Manejar el caso en el que no exista el precio base genérico
            return back()->withErrors(['error' => 'No se encontró un precio base genérico en la base de datos.']);
        }
    
        // Calcular la comisión total por cada hotel y agrupar por mes
        $hotelesConComisiones = [];
    
        foreach ($hoteles as $hotel) {
            // Obtener la comisión del hotel desde la base de datos
            $comisionHotel = \DB::table('tranfer_hotel')
                ->where('id_hotel', $hotel->id_hotel)
                ->value('Comision');
    
            \Log::info('Comisión obtenida desde la base de datos para el hotel:', [
                'hotel_id' => $hotel->id_hotel,
                'comision' => $comisionHotel
            ]);
    
            if (is_null($comisionHotel)) {
                \Log::warning('No se encontró un valor de comisión para el hotel:', ['hotel_id' => $hotel->id_hotel]);
                continue; // Si no hay una comisión, saltar este hotel
            }
    
            // Obtener todas las reservas del hotel
            $reservas = $hotel->reservas;
    
            // Agrupar las reservas por mes y calcular la comisión de cada mes
            $comisionesPorMes = [];
    
            foreach ($reservas as $reserva) {
                $mes = \Carbon\Carbon::parse($reserva->fecha_reserva)->format('Y-m'); // Obtener el año y el mes de la reserva
    
                if (!isset($comisionesPorMes[$mes])) {
                    $comisionesPorMes[$mes] = [
                        'num_reservas' => 0,
                        'total_comision' => 0,
                    ];
                }
    
                // Incrementar el conteo de reservas para el mes
                $comisionesPorMes[$mes]['num_reservas']++;
    
                // Calcular la comisión de la reserva usando el precio genérico y la comisión del hotel
                $comision = $precioBase * ($comisionHotel / 100);
                \Log::info('Valor de la comisión calculado para el hotel:', [
                    'hotel_id' => $hotel->id_hotel,
                    'comision' => $comision,
                    'comision_porcentaje' => $comisionHotel,
                    'precio_base' => $precioBase,
                ]);
    
                $comisionesPorMes[$mes]['total_comision'] += $comision; // Sumar la comisión para el mes correspondiente
            }
    
            $hotelesConComisiones[] = [
                'hotel' => $hotel,
                'comisionesPorMes' => $comisionesPorMes,
            ];
        }
    
        // Pasar la información a la vista
        return view('hotel.comisiones', compact('hotelesConComisiones'));
    }
    


public function verComisionesHotel()
{
    // Obtener el hotel autenticado
    $hotel = Auth::guard('hotel')->user();

    // Verificar si el hotel está autenticado
    if (!$hotel) {
        return back()->withErrors(['error' => 'No se encontró el hotel autenticado.']);
    }

    // Obtener la comisión del hotel desde la base de datos
    $comisionHotel = \DB::table('tranfer_hotel')
        ->where('id_hotel', $hotel->id_hotel)
        ->value('Comision');

    \Log::info('Comisión obtenida desde la base de datos:', ['comision' => $comisionHotel]);

    // Verificar si el valor de la comisión es válido
    if (is_null($comisionHotel)) {
        return back()->withErrors(['error' => 'No se encontró un valor de comisión para el hotel.']);
    }

    // Obtener todas las reservas del hotel autenticado
    $reservas = $hotel->reservas;

    // Verificar si el hotel tiene reservas
    if ($reservas->isEmpty()) {
        return back()->withErrors(['error' => 'El hotel no tiene reservas asociadas.']);
    }

    // Obtener el precio base genérico de la tabla transfer_precios
    $precioBase = \DB::table('transfer_precios')
        ->where('id_precios', 1) // Seleccionar el precio genérico (id_precios = 1)
        ->value('Precio');

    \Log::info('Precio base obtenido:', ['precioBase' => $precioBase]);

    if (!$precioBase) {
        // Manejar el caso en el que no exista el precio base genérico
        return back()->withErrors(['error' => 'No se encontró un precio base genérico en la base de datos.']);
    }

    // Agrupar las reservas por mes y calcular la comisión de cada mes
    $comisionesPorMes = [];

    foreach ($reservas as $reserva) {
        $mes = \Carbon\Carbon::parse($reserva->fecha_reserva)->format('Y-m'); // Obtener el año y el mes de la reserva

        if (!isset($comisionesPorMes[$mes])) {
            $comisionesPorMes[$mes] = [
                'num_reservas' => 0,
                'total_comision' => 0,
            ];
        }

        // Incrementar el conteo de reservas para el mes
        $comisionesPorMes[$mes]['num_reservas']++;

        // Calcular la comisión de la reserva usando el precio genérico y la comisión del hotel obtenida
        $comision = $precioBase * ($comisionHotel / 100);
        \Log::info('Valor de la comisión calculado para el hotel:', [
            'comision' => $comision,
            'comision_porcentaje' => $comisionHotel,
            'precio_base' => $precioBase,
        ]);

        $comisionesPorMes[$mes]['total_comision'] += $comision; // Sumar la comisión para el mes correspondiente
    }

    // Pasar la información a la vista, incluyendo el ID del hotel
    return view('hotel.comision', compact('hotel', 'comisionesPorMes'));
}



public function reservas()
{
    return $this->hasMany(Reserva::class, 'id_hotel', 'id_hotel');
}




public function home()
{
    // Obtener el hotel autenticado
    $hotel = Auth::guard('hotel')->user();

    // Verificar si el hotel es nulo y si no redirigir
    if (!$hotel) {
        return redirect()->route('hotel.login')->withErrors(['usuario' => 'No se encontró el usuario autenticado.']);
    }

    // Pasar el hotel a la vista
    return view('hotel.home', compact('hotel'));
}


}
