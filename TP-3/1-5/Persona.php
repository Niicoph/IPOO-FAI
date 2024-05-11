<?php 


class Persona {
    // atributos
    private $nombre;
    private $DNI; 
    private $apellido;
    // constructor 
    public function __construct($nombre, $apellido, $dni) {
        $this->nombre = $nombre;
        $this->DNI = $dni;
        $this->apellido = $apellido;
    }
    // getters y setters
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getDni() {
        return $this->DNI;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setDni($numero) {
        $this->DNI = $numero;
    }
    public function __toString() {
        return "Nombre: " . $this->getNombre() . "\n" . 
        "Apellido: " . $this->getApellido() . "\n" .
        "DNI: " . $this->getDni() . "\n";
    }
    
}
