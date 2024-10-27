<?php
// Definir la constante BASE_PATH para asegurarnos de que esté disponible
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(dirname(__DIR__)));
}

// Incluir el modelo necesario
require_once BASE_PATH . '/app/models/Vehiculo.php';

class VehiculoController {
    private $vehiculoModel;

    public function __construct() {
        $this->vehiculoModel = new Vehiculo();
    }

    public function listarVehiculos() {
        $vehiculos = $this->vehiculoModel->obtenerVehiculosDisponibles();
        foreach ($vehiculos as $vehiculo) {
            echo "ID: " . $vehiculo['id_vehiculo'] . " - Descripción: " . $vehiculo['descripcion'] . "<br>";
        }
    }

    public function agregarVehiculo($datos) {
        if ($this->vehiculoModel->agregarVehiculo($datos)) {
            echo "Vehículo agregado con éxito";
        } else {
            echo "Error al agregar el vehículo";
        }
    }

    public function eliminarVehiculo($id) {
        if ($this->vehiculoModel->eliminarVehiculo($id)) {
            echo "Vehículo eliminado con éxito";
        } else {
            echo "Error al eliminar el vehículo";
        }
    }
}

?>