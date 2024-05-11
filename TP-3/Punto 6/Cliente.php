<?php 



class Cliente {
    // atributos 
    private int $numDoc;
    private string $tipoDoc;
    // constructor
    public function __construct(int $numDoc, string $tipoDoc) {
        $this->numDoc = $numDoc;
        $this->tipoDoc = $tipoDoc;
    }
    // getters y setters
    public function getNumDoc(): int {
        return $this->numDoc;
    }
    public function getTipoDoc(): string {
        return $this->tipoDoc;
    }
    public function setNumDoc(int $num) {
        $this->numDoc = $num;
    }
    public function setTipoDoc(string $tipo) {
        $this->tipoDoc = $tipo;
    }
    public function __toString() : string {
        return (string) 
        "Numero de documento: " . $this->getNumDoc() . "\n" .
        "Tipo de documento: " . $this->getTipoDoc() . "\n";
    }
}