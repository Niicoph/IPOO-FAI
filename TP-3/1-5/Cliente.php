<?php 


include 'Persona.php';
class Cliente extends Persona {
    //atributos
    private $numeroCliente; 
    // constructor  -> hereda $nombre, $apellido, $dni)
    public function __construct($nombre, $apellido , $dni , $numCliente) {
        parent::__construct($nombre, $apellido, $dni);
        $this->numeroCliente = $numCliente;
    }
    // getters y setters
    public function getNumeroCliente() {
        return $this->numeroCliente;
    }
    public function setNumeroCliente($numCliente) {
        $this->numeroCliente = $numCliente;
    }
    // toString
    public function __toString() {
        $cadena = parent::__toString() .  "\n Numero de Cliente: " . $this->getNumeroCliente();
        return $cadena;
    }
}