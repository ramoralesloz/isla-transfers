<?php

// Clase Vehiculo
class Vehiculo {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function obtenerVehiculosDisponibles() {
        $sql = "SELECT id_vehiculo, Descripción FROM transfer_vehiculo";
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