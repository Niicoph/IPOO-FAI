<?php 


class PaqueteTuristico {
    // atributos 
    private $fechaDesde;
    private $cantidadDias; 
    private $objDestino; //  objeto de la clase Destino
    private $cantidadTotalPlazas;   // 100
    private $cantidadDisponiblePlazas; // 100 95 
    // constructor 
    public function __construct($fechaDesde , $cantidadDias , $objDestino , $cantidadTotalPlazas) {
        $this->fechaDesde = $fechaDesde;
        $this->cantidadDias = $cantidadDias;
        $this->objDestino = $objDestino;
        $this->cantidadTotalPlazas = $cantidadTotalPlazas;
        $this->cantidadDisponiblePlazas =  $cantidadTotalPlazas; // al principio la cantidad disponible es igual a la total
    }
    // getters y setters
    public function getFechaDesde() {
        return $this->fechaDesde;
    }
    public function getCantidadDias() {
        return $this->cantidadDias;
    }
    public function getObjDestino() {
        return $this->objDestino;
    }
    public function getCantidadTotalPlazas() {
        return $this->cantidadTotalPlazas;
    }
    public function getCantidadDisponiblesPlazas() {
        return $this->cantidadDisponiblePlazas;
    }
    public function setFechaDesde($fechaDesde) {
        $this->fechaDesde = $fechaDesde;
    }
    public function setCantidadDias($dias) {
        $this->cantidadDias = $dias;
    }
    public function setObjDestino($objDestino) {
        $this->objDestino = $objDestino;
    }
    public function setCantidadTotalPlazas($cantidad) {
        $this->cantidadTotalPlazas = $cantidad;
    }
    public function setCantidadDisponiblesPlazas($cantidad) {
        $this->cantidadDisponiblePlazas = $cantidad;
    }
    // metodos adicionales

    // toString

    public function __toString() {
        return (string)
        "Fecha Desde: " . $this->getFechaDesde() . "\n" .
        "Cantidad de Dias: " . $this->getCantidadDias() . "\n" .
        "Destino: " . $this->getObjDestino() . "\n" .
        "Cantidad Total de Plazas: " . $this->getCantidadTotalPlazas() . "\n" .
        "Cantidad de Plazas Disponibles: " . $this->getCantidadDisponiblesPlazas() . "\n";
    }
}