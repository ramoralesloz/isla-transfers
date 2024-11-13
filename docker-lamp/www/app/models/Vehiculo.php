<?php
// Vehiculo.php - Modelo que representa un Vehículo

class Vehiculo {
    private $id;
    private $descripcion;
    private $emailConductor;

    public function __construct($id = null, $descripcion = '', $emailConductor = '') {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->emailConductor = $emailConductor;
    }

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getEmailConductor() {
        return $this->emailConductor;
    }

    public function setEmailConductor($emailConductor) {
        $this->emailConductor = $emailConductor;
    }
}
?>
