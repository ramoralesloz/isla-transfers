<?php
// ClienteDAO.php - Implementación del DAO para la entidad Cliente
require_once dirname(__DIR__, 2) . '/config/Database.php';

class ClienteDAO {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function registrarCliente($datos) {
        // Inserción de todos los campos en la tabla transfer_viajeros
        $sql = "INSERT INTO transfer_viajeros (nombre, apellido1, apellido2, direccion, codigoPostal, ciudad, pais, email, password) 
                VALUES (:nombre, :apellido1, :apellido2, :direccion, :codigoPostal, :ciudad, :pais, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $datos['password'] = $datos['password']; // Se deja la contraseña en texto plano
        return $stmt->execute($datos);
    }

    public function obtenerClientePorEmail($email) {
        // Cambiar la tabla a transfer_viajeros
        $sql = "SELECT id_viajero, nombre, email, password FROM transfer_viajeros WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function modificarCliente($id, $datos) {
        // Construir la consulta SQL con los campos que se actualizarán
        $sql = "UPDATE transfer_viajeros SET nombre = :nombre, email = :email";
        
        // Solo agregar el campo de contraseña si está presente
        if (isset($datos['password'])) {
            $sql .= ", password = :password";
        }
        
        $sql .= " WHERE id_viajero = :id";
        $stmt = $this->db->prepare($sql);
    
        // Vincular los parámetros
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $datos['nombre']);
        $stmt->bindParam(':email', $datos['email']);
        
        if (isset($datos['password'])) {
            $stmt->bindParam(':password', $datos['password']);
        }
    
        return $stmt->execute();
    }
    

    public function obtenerClientePorId($id) {
        // Cambiar la tabla a transfer_viajeros
        $sql = "SELECT id_viajero, nombre, email FROM transfer_viajeros WHERE id_viajero = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
