<?php



class Producto {
    // atributos 
    private int $codigoBarra;
    private string $descripcion;
    private int $stock;
    private float $precioCompra;
    private float $porcentajeIVA; 
    private object $objRubro;
    // **** agregado ****
    private string $tipoProducto;


    // constructor
    public function __construct($codigoBarra, $descripcion , $stock , $precioCompra , $porcentajeIVA , $objRubro , $tipoProducto) {
        $this->codigoBarra = $codigoBarra;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->precioCompra = $precioCompra;
        $this->porcentajeIVA = $porcentajeIVA;
        $this->objRubro = $objRubro;
        $this->tipoProducto = $tipoProducto;
    }
    // getters y setters

    // **** agregado ****
    public function getTipoProducto() {
        return $this->tipoProducto;
    }
    public function setTipoProducto($tipo) {
        $this->tipoProducto = $tipo;
    }



    public function getCodigoBarra() : int {
        return $this->codigoBarra;
    }
    public function getDescripcion() : string {
        return $this->descripcion;
    }
    public function getStock() : int {
        return $this->stock;
    }
    public function getPrecioCompra() : float {
        return $this->precioCompra;
    }
    public function getPorcecentajeIVA() : float {
        return $this->porcentajeIVA;
    }
    public function getObjRubro() : object {
        return $this->objRubro;
    }
    public function setCodigoBarra($codigo) {
        $this->codigoBarra = $codigo;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function setStock($stock) {
        $this->stock = $stock;
    }
    public function setPrecioCompra($precioCompra) {
        $this->precioCompra = $precioCompra;
    }
    public function setPorcecentajeIVA($porcentaje) {
        $this->porcentajeIVA = $porcentaje;
    }
    public function setObjRubro($objRubro) {
        $this->objRubro = $objRubro;
    }
    // toString 
    public function __toString() {
        return (string) 
        "Codigo de Barra: " . $this->getCodigoBarra() . "\n" . 
        "Descripcion: " . $this->getDescripcion() . "\n" .
        "Precio de Compra: ". $this->getPrecioCompra() . "\n" .
        "Stock: ". $this->getStock() . "\n" .
        "Porcentaje IVA: ". $this->getPorcecentajeIVA() . "\n" .
        "Rubro: ". $this->getObjRubro() . "\n";
    }

    /*
    El precio de venta de un producto se calcula sobre el precio de compra, más el porcentaje de ganancia en base
    a su rubro, más el porcentaje de IVA que se aplica al producto.
    */
    public function calcularPrecioVenta() :  float  {
        $precioCompra = $this->getPrecioCompra(); // 1000
        $porcentajeGananciaRubro = $this->getObjRubro()->getPorcentajeGananciaPorRubro(); // 55
        $porcentajeIVA = $this->getPorcecentajeIVA();                                       // 21

        $precioProductoIva = $precioCompra + ($porcentajeIVA  *  $precioCompra) / 100;  // precio de compra con IVA incluido
        $precioProductoGanancia = $precioCompra + ($porcentajeGananciaRubro * $precioCompra) / 100; // precio de compra con ganancia incluida
        $valorFinal = $precioProductoIva + $precioProductoGanancia; // precio de venta final
        return $valorFinal;
    }




}