<?php 


class cliente {
    // atributos
    private $nombre;
    private $apellido;
    private $objTramite; 
    // constructor 
    public function __construct($nombre, $apellido , $objTramite) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->objTramite = $objTramite;
    }
    // getters y setters 
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getObjTramite() {
        return $this->objTramite;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setObjTramite($objTramite){
        $this->objTramite = $objTramite;
    }
}