<?php 

include 'Producto.php';

class ProductoImportado extends Producto {
    // atributos 
    private float $porcentajeImpuesto1; // 50%
    private float $impuesto2; // 10%
    // constructor parent:: ($codigoBarra, $descripcion , $stock , $precioCompra , $porcentajeIVA , $objRubro)
    public function __construct($codigoBarra, $descripcion , $stock , $precioCompra , $porcentajeIVA , $objRubro , $tipoProducto) {
        parent::__construct($codigoBarra, $descripcion, $stock , $precioCompra, $porcentajeIVA , $objRubro , $tipoProducto);
        $this->porcentajeImpuesto1 = 50;
        $this->impuesto2 =  10;
    }
    // getters y setters 
    public function getPorcentajeImpuesto1() : float {
        return $this->porcentajeImpuesto1;
    }
    public function getImpuesto2() : float {
        return $this->impuesto2;
    }
    // métodos adicionales
    public function calcularPrecioVenta () : float {
        $precioVentaPrevio = parent::calcularPrecioVenta();
        $porcentajeImpuesto1 = $this->getPorcentajeImpuesto1();
        $porcentajeImpuesto2 = $this->getImpuesto2();
        // calcular el precio de venta con el 50% de impuesto 
        $precioAumentadoImpuesto1 = $precioVentaPrevio + ($porcentajeImpuesto1 * $precioVentaPrevio / 100); // 1000 + 500 = 1500
        // calcular el precio de venta con el 10% de impuesto
        $precioAumentadoImpuesto2 = $precioAumentadoImpuesto1 + ($porcentajeImpuesto2 * $precioAumentadoImpuesto1 / 100); // 1500 + 150 = 1650
        return $precioAumentadoImpuesto2;
    }
    // toString 
    public function __toString() {
        return (string) 
        parent::__toString() . "\n" .
        "Precio Final: " . $this->calcularPrecioVenta() . "\n";
    }

}