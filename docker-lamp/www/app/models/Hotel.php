<?php

// Clase Hotel
class Hotel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function registrarHotel($datos) {
        // Insertar un nuevo hotel en la tabla `transfer_hotel`
        $sql = "INSERT INTO tranfer_hotel (id_zona, comision, usuario, password) 
                VALUES (:id_zona, :comision, :usuario, :password)";
        $stmt = $this->db->prepare($sql);
        // No se aplica hashing porque el usuario lo ha solicitado para propósitos de prueba
        return $stmt->execute($datos);
    }

    public function obtenerHotelPorUsuario($usuario) {
        // Obtener un hotel por su nombre de usuario
        $sql = "SELECT * FROM tranfer_hotel WHERE usuario = :usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['usuario' => $usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
