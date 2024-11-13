<?php
// ReservaController.php - Controlador de Reservas
require_once dirname(__DIR__) . '/dao/DAOFactory.php';

class ReservaController {
    private $ReservaDAO;

    public function __construct() {
        DAOFactory::init();
        $this->ReservaDAO = DAOFactory::getReservaDAO();
    }

    public function crearReserva($datos) {
        if ($this->ReservaDAO->crearReserva($datos)) {
            $_SESSION['mensaje_exito'] = "Reserva creada con éxito";
        } else {
            $_SESSION['mensaje_error'] = "Error al crear la reserva";
        }

        if (isset($_SESSION['tipo_cliente']) && $_SESSION['tipo_cliente'] === 'administrador') {
            header("Location: /reserva/calendario");
        } else {
            header("Location: /reserva/listar");
        }
        exit();
    }

    public function listarReservas() {
        $reservas = $this->ReservaDAO->obtenerTodasLasReservas();

        foreach ($reservas as &$reserva) {
            $fechaReserva = new DateTime($reserva['fecha_entrada'] . ' ' . ($reserva['hora_entrada'] ?? '00:00:00'));
            $fechaActual = new DateTime();
            $intervalo = $fechaActual->diff($fechaReserva);
            $horasRestantes = ($intervalo->days * 24) + $intervalo->h;
            $reserva['cancelable'] = $horasRestantes >= 48;
        }

        return $reservas;
    }

    public function modificarReserva($id, $datos) {
        if ($this->ReservaDAO->modificarReserva($id, $datos)) {
            $_SESSION['mensaje_exito'] = "Reserva modificada con éxito";
        } else {
            $_SESSION['mensaje_error'] = "Error al modificar la reserva";
        }

        if (isset($_SESSION['tipo_cliente']) && $_SESSION['tipo_cliente'] === 'administrador') {
            header("Location: /reserva/calendario");
        } else {
            header("Location: /reserva/listar");
        }
        exit();
    }

    public function eliminarReserva($id) {
        if ($this->ReservaDAO->eliminarReserva($id)) {
            $_SESSION['mensaje_exito'] = "Reserva eliminada con éxito";
        } else {
            $_SESSION['mensaje_error'] = "Error al eliminar la reserva";
        }
        header("Location: /reserva/listar");
        exit();
    }

    public function listarCalendarioReservas() {
        $reservas = $this->ReservaDAO->obtenerTodasLasReservas();
        include dirname(__DIR__, 2) . '/app/views/reservas/calendario_reservas_admin.php';
    }

    public function detalleReserva($id) {
        $reserva = $this->ReservaDAO->obtenerReservaPorId($id);
        if ($reserva) {
            include dirname(__DIR__, 2) . '/app/views/reservas/detalle_reserva.php';
        } else {
            $_SESSION['mensaje_error'] = "Reserva no encontrada.";
            header("Location: /reserva/listar");
            exit();
        }
    }

    public function obtenerReservaPorId($id) {
        return $this->ReservaDAO->obtenerReservaPorId($id);
    }
}

?>
