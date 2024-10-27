<?php

// Clase Cliente
class Cliente {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function registrarCliente($datos) {
        // Cambiar la tabla a transfer_viajeros
        $sql = "INSERT INTO transfer_viajeros (nombre, apellido1, apellido2, direccion, codigoPostal, ciudad, pais, email, password) 
                VALUES (:nombre, :apellido1, :apellido2, :direccion, :codigoPostal, :ciudad, :pais, :email, :password)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($datos);
    }

    public function obtenerClientePorEmail($email) {
        // Cambiar la tabla a transfer_viajeros
        $sql = "SELECT id_viajero, nombre, apellido1, apellido2, direccion, codigoPostal, ciudad, pais, email FROM transfer_viajeros WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function modificarCliente($id, $datos) {
        // Cambiar la tabla a transfer_viajeros
        $sql = "UPDATE transfer_viajeros SET nombre = :nombre, email = :email, password = :password WHERE id_viajero = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $datos['nombre']);
        $stmt->bindParam(':email', $datos['email']);
        $stmt->bindParam(':password', $datos['password']);
        return $stmt->execute();
    }

    public function obtenerClientePorId($id) {
        // Cambiar la tabla a transfer_viajeros
        $sql = "SELECT id_viajero, nombre, apellido1, apellido2, direccion, codigoPostal, ciudad, pais, email FROM transfer_viajeros WHERE id_viajero = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
