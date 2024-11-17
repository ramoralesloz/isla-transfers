<?php
// ReservaController.php - Controlador de Reservas
require_once dirname(__DIR__) . '/DAO/DAOFactory.php';

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
            header("Location:" . BASE_URI . "/reserva/calendario");
        } else {
            header("Location:" . BASE_URI . "/reserva/listar");
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
            header("Location:" . BASE_URI . "/reserva/calendario");
        } else {
            header("Location:" . BASE_URI . "/reserva/listar");
        }
        exit();
    }

    public function eliminarReserva($id) {
        try {
            if ($this->ReservaDAO->eliminarReserva($id)) {
                $_SESSION['mensaje_exito'] = "Reserva eliminada con éxito.";
            }
        } catch (InvalidArgumentException $e) {
            $_SESSION['mensaje_error'] = "Error de validación: " . $e->getMessage();
        } catch (Exception $e) {
            $_SESSION['mensaje_error'] = "Error al eliminar la reserva: " . $e->getMessage();
        }
    
        // Redirigir al listado de reservas, mostrando mensajes según el resultado
        header("Location:" . BASE_URI . "/reserva/listar");
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
            header("Location:" . BASE_URI . "/reserva/listar");
            exit();
        }
    }

    public function obtenerReservaPorId($id) {
        return $this->ReservaDAO->obtenerReservaPorId($id);
    }
}

?>
