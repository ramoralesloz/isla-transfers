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
    
        // Redireccionar según el tipo de cliente
        if ($_SESSION['tipo_cliente'] === 'administrador') {
            header("Location: /reserva/calendario");
        } else {
            header("Location: /reserva/listar");
        }
        exit();
    }
    

    public function listarReservas() {
        // Obtiene todas las reservas desde el modelo
        $reservas = $this->reservaModel->obtenerTodasLasReservas();
    
        // Calcular el tiempo restante para cada reserva y establecer la clave 'cancelable'
        foreach ($reservas as &$reserva) {
            $fechaReserva = new DateTime($reserva['fecha_entrada'] . ' ' . ($reserva['hora_entrada'] ?? '00:00:00'));
            $fechaActual = new DateTime();
            $intervalo = $fechaActual->diff($fechaReserva);
            $horasRestantes = ($intervalo->days * 24) + $intervalo->h;
    
            // Si faltan menos de 48 horas, marcar la reserva como "no cancelable/modificable"
            $reserva['cancelable'] = $horasRestantes >= 48;
        }
    
        // Retorna las reservas en lugar de incluir la vista
        return $reservas;
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
        // Llamar al método eliminarReserva del modelo
        if ($this->reservaModel->eliminarReserva($id)) {
            $_SESSION['mensaje_exito'] = "Reserva eliminada con éxito";
        } else {
            $_SESSION['mensaje_error'] = "Error al eliminar la reserva";
        }
        header("Location: /reserva/listar");
        exit();
    }
    public function listarCalendarioReservas() {
        $reservas = $this->reservaModel->obtenerTodasLasReservas();
        include dirname(__DIR__, 2) . '/app/views/reservas/calendario_reservas_admin.php';
    }
    public function detalleReserva($id) {
        $reserva = $this->reservaModel->obtenerReservaPorId($id);
        if ($reserva) {
            include dirname(__DIR__, 2) . '/app/views/reservas/detalle_reserva.php';
        } else {
            echo "Reserva no encontrada.";
        }
    }
    
}

ob_end_flush(); // Enviar todo el contenido del búfer y desactivarlo
?>
