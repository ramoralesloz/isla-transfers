<?php

// Clase Hotel
class Hotel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function agregarHotel($datos) {
        $sql = "INSERT INTO tranfer_hotel (nombre, id_zona, comision, usuario, password) 
                VALUES (:nombre, :id_zona, :comision, :usuario, :password)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($datos);
    }

    public function obtenerHotelPorId($id) {
        $sql = "SELECT * FROM tranfer_hotel WHERE id_hotel = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
