<?php 


class Rubro {
    // atributos
    private string $descripcion;
    private float $porcentajeGananciaPorRubro; // por rubro x => 0.1 ,  rubro y => 0.2
    // constructor 
    public function __construct($descripcion , $porcentajeGananciaPorRubro) {
        $this->descripcion = $descripcion;
        $this->porcentajeGananciaPorRubro = $porcentajeGananciaPorRubro;
    }
    // getters y setters
    public function getDescripcion(): string {
        return $this->descripcion;
    }
    public function getPorcentajeGananciaPorRubro() : float {
        return $this->porcentajeGananciaPorRubro;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeGananciaPorRubro($porcentaje) {
        $this->porcentajeGananciaPorRubro = $porcentaje;
    }
    // toString 
    public function __toString() {
        return (string) 
            "Descripcion: " . $this->getDescripcion() . "\n" . 
            "Porcentaje de ganancia por rubro: " . $this->getPorcentajeGananciaPorRubro() . "\n";
    }
    // métodos adicionales 
}