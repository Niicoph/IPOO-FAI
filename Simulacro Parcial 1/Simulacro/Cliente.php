<?php 

/*

0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.

*/ 

class Cliente {
    // atributos
    private $nombre;
    private $apellido;
    private $estado; // de baja o activo , en caso de baja no habilitar compras
    private $tipoDocumento;
    private $numeroDocumento;
    //constructor
    public function __construct($nombre, $apellido , $estado, $tipoDocumento , $numeroDocumento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->numeroDocumento = $numeroDocumento;
        $this->tipoDocumento = $tipoDocumento;
    }
    // getters y setters
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    } 
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function setNumeroDocumento($numero) {
        $this->numeroDocumento = $numero;
    }
    public function setTipoDocumento($tipo) {
        $this->tipoDocumento = $tipo;
    }
    // toString
    public function __toString() {
        $string = 
        "Nombre: " . $this->getNombre() . "\n" . 
        "Apellido: ". $this->getApellido() . "\n" .
        "Estado: ". $this->getEstado() . "\n" .
        "Tipo Documento: ". $this->getTipoDocumento() . "\n" .
        "Numero Documento: ". $this->getNumeroDocumento() . "\n";
        return $string;
    }
}