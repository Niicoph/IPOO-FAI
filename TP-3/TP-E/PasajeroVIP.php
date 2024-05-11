<?php 


include_once 'Pasajero.php';

class PasajeroVIP extends Pasajero {
    // atributos
    private $numeroViajeroFrecuente;
    private $cantidadMillas;
    // constructor -> ($nombre, $numeroAsiento , $numeroTicketPasaje)
    public function __construct($nombre, $numeroAsiento , $numeroTicketPasaje , $numeroViajeroFrecuente , $cantidadMillas) {
        parent::__construct($nombre, $numeroAsiento , $numeroTicketPasaje);
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
        $this->cantidadMillas = $cantidadMillas;
    }  
    // getters y setters
    public function getNumeroViajeroFrecuente() {
        return $this->numeroViajeroFrecuente;
    }
    public function getCantidadMillas() {
        return $this->cantidadMillas;
    }
    public function setNumeroViajeroFrecuente($numero) {
        $this->numeroViajeroFrecuente = $numero;
    }
    public function setCantidadMillas($cantidad) {
        $this->cantidadMillas = $cantidad;
    }
    // metodos adicionales

    public function darPorcentajeIncremento() {
        $porcentajeIncrementar = 35;
        if ($this->getCantidadMillas() > 300) {
            $porcentajeIncrementar = 30;
        }
        return $porcentajeIncrementar;
    }

    // toString
    public function __toString() {
        return (string) 
        parent::__toString() . "\n" .
        "Numero de Viajero Frecuente: " . $this->getNumeroViajeroFrecuente() . "\n" .
        "Cantidad de Millas: " . $this->getCantidadMillas() . "\n";
    }
}