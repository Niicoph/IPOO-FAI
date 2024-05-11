<?php 


include 'Producto.php';

class ProductoRegional extends Producto {
    // atributos
    private float $porcentajeDescuentoRegional; 
    // constructor  parent:: ($codigoBarra, $descripcion , $stock , $precioCompra , $porcentajeIVA , $objRubro)
    public function __construct($codigoBarra , $descripcion , $stock , $precioCompra , $porcentajeIVA , $objRubro , $porcentajeDescuentoRegional , $tipoProducto) {
        parent::__construct($codigoBarra, $descripcion , $stock , $precioCompra , $porcentajeIVA , $objRubro , $tipoProducto);
        $this->porcentajeDescuentoRegional = $porcentajeDescuentoRegional;
    }
    // getters y setters
    public function getPorcentajeDescuentoRegional() : float {
        return $this->porcentajeDescuentoRegional;
    }
    public function setPorcentajeDescuentoRegional($porcentajeDescuentoRegional) {
        $this->porcentajeDescuentoRegional = $porcentajeDescuentoRegional;
    }
  
    // métodos adicionales
    public function calcularPrecioVenta() : float {
        $precioVentaPrevio = parent::calcularPrecioVenta();  // calcula el precio de venta del producto utilizando el método de la clase padre -> 1000
        $porcentajeDescuentoRegional = $this->getPorcentajeDescuentoRegional(); // obtiene el porcentaje de descuento regional -> 15%
        $valorDescuento = $precioVentaPrevio * $porcentajeDescuentoRegional / 100; // calcula el valor del descuento   -> 15% de 1000 = 150
        $valorFinal = $precioVentaPrevio - $valorDescuento; // calcula el precio final con el descuento aplicado -> 1000 - 150 = 850
        return $valorFinal;
    }
    // toString 
    public function __toString() {
        return (string) 
        parent::__toString() . "\n" . 
        "Precio Final: " . $this->calcularPrecioVenta() . "\n";
    }
}