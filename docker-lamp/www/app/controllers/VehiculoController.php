<?php
// VehiculoController.php - Controlador de Vehiculos
require_once dirname(__DIR__) . '/dao/DAOFactory.php';

class VehiculoController {
    private $vehiculoDAO;

    public function __construct() {
        DAOFactory::init();
        $this->vehiculoDAO = DAOFactory::getVehiculoDAO();
    }

    public function listarVehiculos() {
        $vehiculos = $this->vehiculoDAO->obtenerVehiculosDisponibles();
        foreach ($vehiculos as $vehiculo) {
            echo "ID: " . $vehiculo['id_vehiculo'] . " - Descripción: " . $vehiculo['descripcion'] . "<br>";
        }
    }

    public function agregarVehiculo($datos) {
        if ($this->vehiculoDAO->agregarVehiculo($datos)) {
            echo "Vehículo agregado con éxito";
        } else {
            echo "Error al agregar el vehículo";
        }
    }

    public function eliminarVehiculo($id) {
        if ($this->vehiculoDAO->eliminarVehiculo($id)) {
            echo "Vehículo eliminado con éxito";
        } else {
            echo "Error al eliminar el vehículo";
        }
    }
}
?>
