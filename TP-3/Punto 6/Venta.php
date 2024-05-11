<?php 


class Venta {
    // atributos
    private int $fecha;  
    private array $colProductos;  // array de objetos Producto
    private string $objCliente; // "Juan Perez"
    // constructor 
    public function __construct($fecha , $colProductos , $objCliente) {
        $this->fecha = $fecha;
        $this->colProductos = $colProductos;
        $this->objCliente = $objCliente;
    } 
    // getters y setters
    public function getFecha() : int {
        return $this->fecha;
    }
    public function getColProductos() : array {
        return $this->colProductos;
    }
    public function getObjCliente() : string {
        return $this->objCliente;
    }
    // métodos adicionales
    public function darImporteVenta() : float {
        $colProductos = $this->getColProductos(); // [$obj1, $obj2, $obj3]
        $valorTotal = 0;
        foreach ($colProductos as $producto) {
            $valorProducto = $producto->calcularPrecioVenta();
            $valorTotal += $valorProducto;
        }
        return $valorTotal;
    }

    // mostrarProductos
    public function mostrarProductos() : string {
        $colProductos = $this->getColProductos();
        $mensaje = "";
        foreach ($colProductos as $producto) {
            $mensaje .= $producto->__toString() . "\n";
        }
        return $mensaje;
    }

    // toString
    public function __toString() : string {
        return (string) 
        "Fecha: " . $this->getFecha() . "\n" .
        "Cliente: " . $this->getObjCliente() . "\n" .
        "Productos-> " . $this->mostrarProductos() . "\n" .
        "Importe Final: " . $this->darImporteVenta() . "\n"; 
    }

}









