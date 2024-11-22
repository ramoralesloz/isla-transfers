<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HotelAuthenticate
{
    public function handle($request, Closure $next)
    {
        \Log::info('Middleware HotelAuthenticate: Verificando autenticación', [
            'authenticated' => Auth::guard('hotel')->check(),
            'user' => Auth::guard('hotel')->user(),
            'session' => $request->session()->all(), // Esto muestra todos los valores almacenados en la sesión
        ]);
    
        if (!Auth::guard('hotel')->check()) {
            \Log::warning('El usuario no está autenticado como hotel, redirigiendo al login de hotel.');
            return redirect()->route('hotel.login');
        }
    
        \Log::info('El usuario está autenticado como hotel, continuando con la solicitud.', [
            'user' => Auth::guard('hotel')->user()
        ]);
    
        return $next($request);
    }
    
}

