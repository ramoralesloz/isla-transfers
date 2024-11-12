<?php

ob_start(); // Iniciar output buffering

// Definir la constante BASE_PATH para asegurarnos de que esté disponible
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(dirname(__DIR__)));
}

// Incluir el modelo necesario
require_once BASE_PATH . '/app/models/Hotel.php';

class HotelController {
    private $hotelModel;

    public function __construct() {
        $this->hotelModel = new Hotel();
    }

    public function registrarHotel($datos) {
        if (isset($datos['id_zona'], $datos['comision'], $datos['usuario'], $datos['password'])) {
            if ($this->hotelModel->registrarHotel($datos)) {
                $_SESSION['mensaje_exito'] = "Hotel registrado con éxito";
                header("Location: /hotel/login");
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
            // Buscar el hotel en la base de datos
            $hotel = $this->hotelModel->obtenerHotelPorUsuario($datos['usuario']);

            if ($hotel && $hotel['password'] === $datos['password']) {
                // Manejo de sesión para hoteles
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
}

ob_end_flush(); // Enviar todo el contenido del búfer y desactivarlo
?>
