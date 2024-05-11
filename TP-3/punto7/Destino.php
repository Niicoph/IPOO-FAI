<?php 



class Destino {
    // atributos 
    private $nombre;
    private $id;
    private $valorPersona; // valor por dia por persona
    // constructor 
    public function __construct($nombre, $id  , $valorPersona) {
        $this->nombre = $nombre;
        $this->id = $id;
        $this->valorPersona = $valorPersona;
    }
    // getters y setters
    public function getNombre() {
        return $this->nombre;
    }
    public function getId() {
        return $this->id;
    }
    public function getValorPersona() {
        return $this->valorPersona;
    }
    // metodos adicionales 

    // toString 
    public function __toString()  {
        return  (string) 
        "Nombre: " . $this->getNombre() . "\n" .
        "Id: ". $this->getId() . "\n" .
        "Valor por Persona: ". $this->getValorPersona() . "\n";
    }

}