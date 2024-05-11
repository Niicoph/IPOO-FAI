<?php

include_once 'Venta.php';   

class VentaOnline extends Venta {
    // atributos 
    private $porcentajeDescuento; // 20%
    // constructor  -> $fecha, $objPaquete , $cantidadPersonas, $objCliente
    public function __construct($fecha, $objPaquete , $cantidadPersonas , $objCliente , $porcentajeDescuento) {
        parent::__construct($fecha, $objPaquete , $cantidadPersonas , $objCliente);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }
    // getters y setters
    public function getPorcentajeDescuento() {
        return $this->porcentajeDescuento;
    }
    public function setPorcentajeDescuento($porcentajeDescuento) {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }
    // metodos adicionales 

    public function darImporteVenta() {
        $importePrevio = parent::darImporteVenta();
        $porcentajeDescuento = $this->getPorcentajeDescuento();
        $valorADescontar = ($importePrevio * $porcentajeDescuento) / 100;
        $importeFinal = $importePrevio - $valorADescontar;
        return $importeFinal;
    }


    // toString
    public function __toString() {
        return (string)
        "Fecha: " . parent::getFecha() . "\n" . 
        "Paquete Turistico: " . parent::getObjPaqueteTuristico() . "\n" .
        "Cantidad de Personas: " . parent::getCantidadPersonas() . "\n" .
        "Cliente: " . parent::getObjCliente() . "\n" .
        "Importe Total: " . $this->darImporteVenta() . "\n". 
        "Porcentaje de Descuento: " . $this->getPorcentajeDescuento() . "\n";
    }
}