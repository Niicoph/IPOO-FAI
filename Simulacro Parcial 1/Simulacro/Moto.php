<?php 

/*

1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.


*/


class Moto {
    // atributos 
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa; // true si está disponible para la venta, false en caso contrario
    // constructor
    public function __construct($codigo, $costo , $anio , $descripcion , $porcentajeIncrementoAnual , $activa) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anio;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }
    // getters y setters
    public function getCodigo() {
        return $this->codigo;
    }
    public function getCosto() {
        return $this->costo;
    }
    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getPorcecentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }
    public function getActiva() {
        return $this->activa;
    }
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    public function setCosto($costo) {
        $this->costo = $costo;
    }
    public function setAnioFabricacion($anio) {
        $this->anioFabricacion = $anio;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }
    public function setActiva($activa) {
        $this->activa = $activa;
    }
    // metodos adicionales
    public function darPrecioVenta() {
        $activa = $this->getActiva(); // si true devuelve precio , si false devuelve -1
        if ($activa) {
            $_compra = $this->getCosto(); // 2.230.000
            $anioActual = 2024;   
            $anio = $anioActual - $this->getAnioFabricacion(); 
            $por_inc_anual = $this->getPorcecentajeIncrementoAnual();
            $_venta = $_compra +  $_compra * ($anio * $por_inc_anual); 
            return $_venta;
        } else {
            return -1;
        }
    }
    // toString
    public function __toString() {
        $string = 
           "Codigo: " . $this->getCodigo() . "\n" .
           "Costo: " . $this->getCosto() . "\n" .
           "AnioFabricacion: " . $this->getAnioFabricacion() . "\n" .
           "Descripcion: " . $this->getDescripcion() . "\n" .
           "Porcentaje Incremento Anual: " . $this->getPorcecentajeIncrementoAnual() . "\n" .
           "Activa: " . $this->getActiva() . "\n" ;
        return $string;
    }
}

