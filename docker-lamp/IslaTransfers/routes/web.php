<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return view('welcome'); // Página principal
});
Route::view('/', 'welcome')->name('welcome');
// Redirección para la ruta `login`
Route::get('/login', function () {
    return redirect()->route('cliente.login');
})->name('login');
Route::post('/logout', [HotelController::class, 'logout'])->name('logout');

// Rutas relacionadas con el cliente (sin protección de middleware para login y registro)
Route::get('/cliente/login', [ClienteController::class, 'mostrarLogin'])->name('cliente.login');
Route::post('/cliente/login', [ClienteController::class, 'login']);
Route::get('/cliente/registrar', [ClienteController::class, 'mostrarRegistro'])->name('cliente.registrar');
Route::post('/cliente/registrar', [ClienteController::class, 'registrarCliente']);
// Rutas protegidas para clientes autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [ClienteController::class, 'homeAdmin'])->name('admin.home');
    Route::get('/cliente/home', [ClienteController::class, 'home'])->name('cliente.home');
    Route::get('/cliente/perfil', [ClienteController::class, 'mostrarPerfil'])->name('cliente.perfil');
    Route::post('/cliente/modificar', [ClienteController::class, 'modificarPerfil'])->name('cliente.modificar');
    Route::get('/hotel/comisiones', [HotelController::class, 'verComisionesAdmin'])->name('hotel.comisiones');

});
//Route::get('/admin/home', [ClienteController::class, 'homeAdmin'])->name('admin.home');
// Rutas relacionadas con las reservas
Route::get('/reserva/crear', [ReservaController::class, 'mostrarCrear'])->name('reserva.crear');
Route::post('/reserva/guardar', [ReservaController::class, 'guardarReserva'])->name('reserva.guardar');
Route::get('/reserva/listar', [ReservaController::class, 'listarReservas'])->name('reserva.listar');
Route::get('/reserva/modificar/{id}', [ReservaController::class, 'mostrarModificar'])->name('reserva.mostrarModificar');
Route::post('/reserva/modificar/{id}', [ReservaController::class, 'modificarReserva'])->name('reserva.modificar');
Route::get('/reserva/eliminar/{id}', [ReservaController::class, 'eliminarReserva'])->name('reserva.eliminar');
Route::get('/reserva/calendario', [ReservaController::class, 'mostrarCalendario'])->name('reserva.calendario');
Route::get('/reserva/detalle/{id}', [ReservaController::class, 'detalleReserva'])->name('reserva.detalle');


// Rutas relacionadas con los vehículos
Route::get('/vehiculo/listar', [VehiculoController::class, 'listar'])->name('vehiculo.listar');

// Rutas relacionadas con los hoteles
Route::middleware('auth')->group(function () {
    Route::get('hotel/registrar', [HotelController::class, 'showRegisterForm'])->name('hotel.registrar');
    Route::post('hotel/registrar', [HotelController::class, 'registrarHotel'])->name('hotel.registrar.post');
});

//Route::middleware('guest:hotel')->group(function () {
    Route::get('hotel/login', [HotelController::class, 'showLoginForm'])->name('hotel.login');
    Route::post('hotel/login', [HotelController::class, 'login']);
//});

Route::middleware('auth.hotel')->group(function () {
    Route::get('hotel/home', [HotelController::class, 'home'])->name('hotel.home');
    Route::post('/hotel/logout', [HotelController::class, 'logout'])->name('logout');
    Route::get('/hotel/comision', [HotelController::class, 'verComisionesHotel'])->name('hotel.comision');
    Route::get('hotel/reserva/crear', [HotelController::class, 'mostrarCrearReserva'])->name('hotel.reserva.crear');
    Route::post('hotel/reserva/guardar', [HotelController::class, 'guardarReserva'])->name('hotel.reserva.guardar');
});


// Ruta para páginas en construcción
Route::get('/en_construccion', function () {
    return view('en_construccion');
})->name('en_construccion');

