<?php 


class Persona {
    // atributos
    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $numeroDocumento;
    // constructor
    public function __construct($nombre, $apellido, $tipoDocumento , $numeroDocumento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }
    // getters y setters
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }
    public function setNumeroDocumebnt($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }
    // metodo to_string
    public function __toString() {
        $string = "Nombre:" . $this->getNombre() .  "\n"  .  "Apellido:"  . $this->getApellido() . "\n"  . "Tipo documento:" . $this->getTipoDocumento() . "\n" . "Numero Documento:" .  $this->getNumeroDocumento() ;
        return $string;
    }
    
}