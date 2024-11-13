<?php
// Hotel.php - Modelo que representa a un Hotel

class Hotel {
    private $id;
    private $idZona;
    private $comision;
    private $usuario;
    private $password;

    // Constructor para inicializar los atributos del hotel
    public function __construct($id = null, $idZona = null, $comision = 0, $usuario = '', $password = '') {
        $this->id = $id;
        $this->idZona = $idZona;
        $this->comision = $comision;
        $this->usuario = $usuario;
        $this->password = $password;
    }

    // Getters y Setters

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdZona() {
        return $this->idZona;
    }

    public function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    public function getComision() {
        return $this->comision;
    }

    public function setComision($comision) {
        $this->comision = $comision;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}
?>
