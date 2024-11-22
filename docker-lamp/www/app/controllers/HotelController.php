<?php
// HotelController.php - Controlador de Hotel
require_once dirname(__DIR__) . '/DAO/DAOFactory.php';

class HotelController {
    private $hotelDAO;

    public function __construct() {
        DAOFactory::init();
        $this->hotelDAO = DAOFactory::getHotelDAO();
    }

    public function registrarHotel($datos) {
        if (isset($datos['id_zona'], $datos['comision'], $datos['usuario'], $datos['password'])) {
            if ($this->hotelDAO->registrarHotel($datos)) {
                $_SESSION['mensaje_exito'] = "Hotel registrado con éxito";
                header("Location: /hotel/registrar");
                exit();
            } else {
                $_SESSION['mensaje_error'] = "Error al registrar el hotel";
                header("Location: /hotel/registrar");
                exit();
            }
        } else {
            $_SESSION['mensaje_error'] = "Error: Datos incompletos para registrar el hotel.";
            header("Location: /hotel/registrar");
            exit();
        }
    }

    public function login($datos) {
        if (isset($datos['usuario']) && isset($datos['password'])) {
            $hotel = $this->hotelDAO->obtenerHotelPorUsuario($datos['usuario']);

            if ($hotel && $hotel['password'] === $datos['password']) {
                $_SESSION['hotel_id'] = $hotel['id_hotel'];
                $_SESSION['tipo_cliente'] = 'corporativo';
                header("Location: /hotel/home");
                exit();
            } else {
                $_SESSION['mensaje_error'] = "Credenciales incorrectas";
                header("Location: /hotel/login");
                exit();
            }
        } else {
            $_SESSION['mensaje_error'] = "Error: Datos de inicio de sesión incompletos.";
            header("Location: /hotel/login");
            exit();
        }
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



