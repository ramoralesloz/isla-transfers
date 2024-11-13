<?php
// HotelDAO.php - Implementación del DAO para la entidad Hotel
require_once dirname(__DIR__, 2) . '/config/Database.php';

class HotelDAO {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function registrarHotel($datos) {
        $sql = "INSERT INTO tranfer_hotel (id_zona, comision, usuario, password) 
                VALUES (:id_zona, :comision, :usuario, :password)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($datos); // No aplica hashing porque es solo para pruebas
    }

    public function obtenerHotelPorUsuario($usuario) {
        $sql = "SELECT * FROM tranfer_hotel WHERE usuario = :usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['usuario' => $usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
