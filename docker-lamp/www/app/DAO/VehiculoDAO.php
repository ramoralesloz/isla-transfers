<?php
// VehiculoDAO.php - Implementación del DAO para la entidad Vehiculo
require_once dirname(__DIR__, 2) . '/config/Database.php';

class VehiculoDAO {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function obtenerVehiculosDisponibles() {
        $sql = "SELECT id_vehiculo, descripcion FROM transfer_vehiculos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarVehiculo($datos) {
        $sql = "INSERT INTO transfer_vehiculos (descripcion, email_conductor) VALUES (:descripcion, :email_conductor)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($datos);
    }

    public function eliminarVehiculo($id) {
        $sql = "DELETE FROM transfer_vehiculos WHERE id_vehiculo = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
