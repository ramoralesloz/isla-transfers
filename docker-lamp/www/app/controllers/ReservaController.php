<?php

ob_start(); // Iniciar output buffering

require_once dirname(__DIR__, 2) . '/app/models/Reserva.php'; // Incluye el modelo Reserva

class ReservaController {
    private $reservaModel;

    public function __construct() {
        $this->reservaModel = new Reserva();
    }

    public function crearReserva($datos) {
        if ($this->reservaModel->crearReserva($datos)) {
            $_SESSION['mensaje_exito'] = "Reserva creada con éxito";
        } else {
            $_SESSION['mensaje_error'] = "Error al crear la reserva";
        }
        header("Location: /reserva/listar");
        exit();
    }

    public function listarReservas() {
        $reservas = $this->reservaModel->obtenerTodasLasReservas();
        include BASE_PATH . '/app/views/reservas/listar.php';
    }
    

    public function modificarReserva($id, $datos) {
        if ($this->reservaModel->modificarReserva($id, $datos)) {
            $_SESSION['mensaje_exito'] = "Reserva modificada con éxito";
        } else {
            $_SESSION['mensaje_error'] = "Error al modificar la reserva";
        }
        header("Location: /reserva/listar");
        exit();
    }

    public function eliminarReserva($id) {
        if ($this->reservaModel->eliminarReserva($id)) {
            $_SESSION['mensaje_exito'] = "Reserva eliminada con éxito";
        } else {
            $_SESSION['mensaje_error'] = "Error al eliminar la reserva";
        }
        header("Location: /reserva/listar");
        exit();
    }
}

ob_end_flush(); // Enviar todo el contenido del búfer y desactivarlo
?>
