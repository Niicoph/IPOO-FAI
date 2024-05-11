<?php 



class Cliente {
    // atributos 
    private $numDoc;
    private $tipoDoc;
    // constructor
    public function __construct($numDoc , $tipoDoc) {
        $this->numDoc = $numDoc;
        $this->tipoDoc = $tipoDoc;
    }
    // getters y setters
    public function getNumDoc() {
        return $this->numDoc;
    }
    public function getTipoDoc() {
        return $this->tipoDoc;
    }
    public function  setNumDoc($numDoc) {
        $this->numDoc = $numDoc;
    }
    public function setTipo($tipoDoc) {
        $this->tipoDoc = $tipoDoc;
    }
    // metodos adicionales
    // toString
    public function __toString() {
        return (string) 
        "Numero de Documento: " . $this->getNumDoc() . "\n" .
        "Tipo de Documento: " . $this->getTipoDoc() . "\n";
    }
}