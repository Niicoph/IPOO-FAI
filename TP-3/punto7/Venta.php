<?php 



class Venta {
    // atributos
    private $fecha;
    private $objPaqueteTuristico; // objeto de la clase PaqueteTuristico
    private $cantidadPersonas;
    private $objCliente; // objeto de la clase Cliente
    // constructor
    public function __construct($fecha, $objPaquete , $cantidadPersonas, $objCliente) {
        $this->fecha = $fecha;
        $this->objPaqueteTuristico = $objPaquete;
        $this->cantidadPersonas = $cantidadPersonas;
        $this->objCliente = $objCliente;
    }
    // getters y setters
    public function getFecha() {
        return $this->fecha;
    }
    public function getObjPaqueteTuristico() {
        return $this->objPaqueteTuristico;
    }
    public function getCantidadPersonas() {
        return $this->cantidadPersonas;
    }
    public function getObjCliente() {
        return $this->objCliente;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setObjPaqueteTuristico($objPaqueteTuristico) {
        $this->objPaqueteTuristico = $objPaqueteTuristico;
    }
    public function setCantidadPersonas($cantidad) {
        $this->cantidadPersonas = $cantidad;
    }
    public function setObjCliente($objCliente) {
        $this->objCliente = $objCliente;
    }
    // metodos adicionales
    

    public function darImporteVenta() {
        $cantidadDias = $this->getObjPaqueteTuristico()->getCantidadDias(); // cantidad de dias del paquete turistico
        $importePorDia = $this->getObjPaqueteTuristico()->getObjDestino()->getValorPersona(); // valor por dia por persona
        $cantidadPersonas = $this->getCantidadPersonas(); // cantidad de personas que viajan
        $importeTotalUnDia = $cantidadPersonas * $importePorDia; // importe total por dia para x cantidad de personas
        $importeFinal = $importeTotalUnDia * $cantidadDias;  // importe total por la cantidad de dias
        return $importeFinal;
    }


    //toString 
    public function __toString() {
        return (string)
        "Fecha: " . $this->getFecha() . "\n" .
        "Paquete Turistico: " . $this->getObjPaqueteTuristico() . "\n" .
        "Cantidad de Personas: " . $this->getCantidadPersonas() . "\n" .
        "Importe Total: "  . $this->darImporteVenta() . "\n" .
        "Cliente: " . $this->getObjCliente() . "\n";
    }

}