<?php 

class Pasajero {
    // atributos 
    private $nombre;
    private $numeroAsiento;
    private $numeroTicketPasaje;
    // constructor 
    public function __construct($nombre, $numeroAsiento , $numeroTicketPasaje) {
        $this->nombre = $nombre;
        $this->numeroAsiento = $numeroAsiento;
        $this->numeroTicketPasaje = $numeroTicketPasaje;
    }
    // getters y setters
    public function getNombre() {
        return $this->nombre;
    }
    public function getNumeroAsiento() {
        return $this->numeroAsiento;
    }
    public function getNumeroTicketPasaje() {
        return $this->numeroTicketPasaje;
    }
    public function setNombre($n) {
        $this->nombre = $n;
    }
    public function setNumeroAsiento($numero) {
        $this->numeroAsiento = $numero;
    }
    public function setNumeroTicketPasaje($numero) {
        $this->numeroTicketPasaje = $numero;
    }
    // metodos adicionales

    public function darPorcentajeIncremento() {
        return 0;
    }



    // toString 
    public function __toString() {
        return (string)
        "Nombre: " . $this->getNombre() . "\n" .
        "Numero de Asiento: " . $this->getNumeroAsiento() . "\n" .
        "Numero de Ticket de Pasaje: " . $this->getNumeroTicketPasaje() . "\n" .
        "Porcentaje de Incremento: " . $this->darPorcentajeIncremento() . "\n";
    }
}