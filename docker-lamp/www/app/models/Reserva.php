<?php
// Reserva.php - Modelo que representa una Reserva

class Reserva {
    private $id;
    private $localizador;
    private $idHotel;
    private $idTipoReserva;
    private $emailCliente;
    private $fechaReserva;
    private $fechaModificacion;
    private $idDestino;
    private $fechaEntrada;
    private $horaEntrada;
    private $numeroVuelo;
    private $origenVueloEntrada;
    private $fechaVueloSalida;
    private $horaVueloSalida;
    private $horaRecogida;
    private $numViajeros;
    private $idVehiculo;

    public function __construct() {
        // Inicializa con valores por defecto si es necesario
    }

    // Getters y Setters

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLocalizador() {
        return $this->localizador;
    }

    public function setLocalizador($localizador) {
        $this->localizador = $localizador;
    }

    public function getIdHotel() {
        return $this->idHotel;
    }

    public function setIdHotel($idHotel) {
        $this->idHotel = $idHotel;
    }

    public function getIdTipoReserva() {
        return $this->idTipoReserva;
    }

    public function setIdTipoReserva($idTipoReserva) {
        $this->idTipoReserva = $idTipoReserva;
    }

    public function getEmailCliente() {
        return $this->emailCliente;
    }

    public function setEmailCliente($emailCliente) {
        $this->emailCliente = $emailCliente;
    }

    public function getFechaReserva() {
        return $this->fechaReserva;
    }

    public function setFechaReserva($fechaReserva) {
        $this->fechaReserva = $fechaReserva;
    }

    public function getFechaModificacion() {
        return $this->fechaModificacion;
    }

    public function setFechaModificacion($fechaModificacion) {
        $this->fechaModificacion = $fechaModificacion;
    }

    public function getIdDestino() {
        return $this->idDestino;
    }

    public function setIdDestino($idDestino) {
        $this->idDestino = $idDestino;
    }

    public function getFechaEntrada() {
        return $this->fechaEntrada;
    }

    public function setFechaEntrada($fechaEntrada) {
        $this->fechaEntrada = $fechaEntrada;
    }

    public function getHoraEntrada() {
        return $this->horaEntrada;
    }

    public function setHoraEntrada($horaEntrada) {
        $this->horaEntrada = $horaEntrada;
    }

    public function getNumeroVuelo() {
        return $this->numeroVuelo;
    }

    public function setNumeroVuelo($numeroVuelo) {
        $this->numeroVuelo = $numeroVuelo;
    }

    public function getOrigenVueloEntrada() {
        return $this->origenVueloEntrada;
    }

    public function setOrigenVueloEntrada($origenVueloEntrada) {
        $this->origenVueloEntrada = $origenVueloEntrada;
    }

    public function getFechaVueloSalida() {
        return $this->fechaVueloSalida;
    }

    public function setFechaVueloSalida($fechaVueloSalida) {
        $this->fechaVueloSalida = $fechaVueloSalida;
    }

    public function getHoraVueloSalida() {
        return $this->horaVueloSalida;
    }

    public function setHoraVueloSalida($horaVueloSalida) {
        $this->horaVueloSalida = $horaVueloSalida;
    }

    public function getHoraRecogida() {
        return $this->horaRecogida;
    }

    public function setHoraRecogida($horaRecogida) {
        $this->horaRecogida = $horaRecogida;
    }

    public function getNumViajeros() {
        return $this->numViajeros;
    }

    public function setNumViajeros($numViajeros) {
        $this->numViajeros = $numViajeros;
    }

    public function getIdVehiculo() {
        return $this->idVehiculo;
    }

    public function setIdVehiculo($idVehiculo) {
        $this->idVehiculo = $idVehiculo;
    }
}
?>
