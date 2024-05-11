<?php 


include 'Producto.php';
include 'Venta.php';

class Local {
    // atributos 
    private array $colProductosImportados;
    private array $colProductosRegionales; 
    private array $colVentas;
    // constructor 
    public function __construct($colProductosImportados , $colProductosRegionales , $colVentas) {
        $this->colProductosImportados = $colProductosImportados;
        $this->colProductosRegionales = $colProductosRegionales;
        $this->colVentas = $colVentas;
    }
    // getters y setters
    public function getColProductosImportados() : array {
        return $this->colProductosImportados;
    }
    public function getColProductosRegionales() : array {
        return $this->colProductosRegionales;
    }
    public function getColVentas() : array {
        return $this->colVentas;
    }
    public function setColProductosImportados(array $colProductosImportados) {
        $this->colProductosImportados = $colProductosImportados;
    }
    public function setColProductosRegionales(array  $colProductosRegionales) {
        $this->colProductosRegionales = $colProductosRegionales;
    }
    public function setColVentas(array $colVentas) {
        $this->colVentas = $colVentas;
    }
    // métodos adicionales
    public function incorporarProductoLocal (object $objProducto) : bool {
        $tipoProducto = $objProducto->getTipoProducto();
        $codigoBarraProducto = $objProducto->getCodigoBarra();
        if ($tipoProducto == "importado") {
            $i = 0;
            $encontrado = false;
            $colProductosImportados = $this->getColProductosImportados();
            while ($i < count($colProductosImportados) && $encontrado == false) {
                if ($colProductosImportados[$i]->getCodigoBarra() == $codigoBarraProducto) {
                    $encontrado = true;
                }
                $i++;
            }
            if ($encontrado == false){
                array_push($colProductosImportados , $objProducto);
                $this->setColProductosImportados($colProductosImportados);
            }
        } else if ($tipoProducto == "regional") {
            $i = 0;
            $encontrado = false; 
            $colProductosRegionales = $this->getColProductosRegionales();
            while ($i < count($colProductosRegionales) && $encontrado == false){
                if ($colProductosRegionales[$i]->getCodigoBarra() == $codigoBarraProducto) {
                    $encontrado = true;
                }
                $i++;
            }
            if ($encontrado == false) {
                array_push($colProductosRegionales , $objProducto);
                $this->setColProductosRegionales($colProductosRegionales);
            }
        }
        return $encontrado; // return true si el producto ya estaba en el local y false si no estaba en el local y se incorporó
    }
    public function retornarImporteProducto($codigoBarraProducto) : float { 
        $importeProducto = 0;
        $encontrado = false;
        $i = 0;
        $colProductoImportados = $this->getColProductosImportados();
        while ($i < count($colProductoImportados) && $encontrado == false){
            if ($colProductoImportados[$i]->getCodigoBarra() == $codigoBarraProducto) {
                $encontrado = true;
                $importeProducto = $colProductoImportados[$i]->calcularPrecioVenta();
            } $i++;
        } if ($encontrado == false) {
        $i = 0;
        $encontrado = false;
        $colProductosRegionales = $this->getColProductosRegionales();
        while ($i < count($colProductosRegionales) && $encontrado == false){
            if ($colProductosRegionales[$i]->getCodigoBarra() == $codigoBarraProducto) {
                $encontrado = true;
                $importeProducto = $colProductosRegionales[$i]->calcularPrecioVenta();
            }
        }
        } if (!$encontrado) {
           $importeProducto = -1;
        }
        return $importeProducto;
    }

    public function retornarCostoTotalProductos() : float {
        $colProductosImportados = $this->getColProductosImportados();
        $colProductosRegionales = $this->getColProductosRegionales(); 
        $costoTotal = 0;
        foreach ($colProductosImportados as $productoImportado) {
            $stockProductos = $productoImportado->getStock();
            $precioProducto = $productoImportado->calcularPrecioVenta();
            $importeDeProductos = $stockProductos * $precioProducto;
            $costoTotal += $importeDeProductos;
        }
        foreach ($colProductosRegionales as $productoRegional) {
            $stockProductos = $productoRegional->getStock();
            $precioProducto = $productoRegional->calcularPrecioVenta();
            $importeDeProductos = $stockProductos * $precioProducto;
            $costoTotal += $importeDeProductos;
        }
        return $costoTotal;
    }


    public function productoMasEconomico($objRubro) {
        $colProductosImportados = $this->getColProductosImportados(); // [$obj1, $obj2, $obj3]
        $colProductosRegionales = $this->getColProductosRegionales();
        $objetosMismoRubro = [];
        foreach ($colProductosImportados as $productoImportado) {
            if ($productoImportado->getObjRubro() == $objRubro) {
                array_push($objetosMismoRubro, $productoImportado);
            }
        } 
        foreach ($colProductosRegionales as $productoRegional) {
            if ($productoRegional->getObjRubro() == $objRubro) {
                array_push($objetosMismoRubro, $productoImportado);
            }
        }
        $precioFinal = 0;
        foreach ($objetosMismoRubro as $objeto) {
            $precioProducto = $objeto->calcularPrecioVenta();
            if ($precioProducto > $precioFinal) {
                $precioFinal = $precioProducto;
            }
        }
        return $precioFinal;
    }

    public function informarProductosMasVendidos($anio , $n) {  // 2020 , n = el producto que se repite n veces 
        $coleccionVentas = $this->getColVentas(); // [$venta1, $venta2, $venta3] $venta = ($fecha , $colProductos , $cliente)
        
        $objetos = []; // todos los productos vendidos en todas las ventas hechas en el anio 2020
        
        foreach($coleccionVentas as $venta) {
             $anioVenta = $venta->getFecha(); // 2020
             if ($anioVenta == $anio) {
                $colProductos = $venta->getColProducto(); 
                foreach ($colProductos as $producto) {
                    array_push($objetos, $producto);  // si coincide el anio , se agregan los productos de la venta a la coleccion de objetos
                }
             }
        }

        // contar cuantas veces se vendio cada producto en el anio 2020
        $contadorProductos = [];
        foreach ($objetos as $producto) {
            $codigoBarraProducto = $producto->getCodigoBarra();
            if (isset($contadorProductos[$codigoBarraProducto])) {
                $contadorProductos[$codigoBarraProducto]++;
            } else {
                $contadorProductos[$codigoBarraProducto] = 1;
            }
        }
        $productosMasVendidos = [];
        foreach ($contadorProductos as $codigoBarraProducto => $cantidadVentas) {
            if ($cantidadVentas > $n) {
                array_push($productosMasVendidos , $codigoBarraProducto);
            }
        }
        $colProductosMasVendidos = [];
        foreach ($objetos as $producto) {
            $codigoBarra = $producto->getCodigoBarra();
            foreach ($productosMasVendidos as $codigoBarraProducto) {
                if ($codigoBarra == $codigoBarraProducto) {
                    array_push($colProductosMasVendidos , $producto);
                }
            }
        }
        return $colProductosMasVendidos;
    }
    public function promedioVentasImportados() {
        $colVentas = $this->getColVentas();  
        $cantidadProductosImportados = 0;    
        $ventasConProductosImportados = 0;    
    
        foreach($colVentas as $venta) {
            $colProductos = $venta->getColProductos(); 
            $productosImportados = 0; // reiniciamos el contador para cada venta
            foreach ($colProductos as $producto) {
                $tipoProducto = $producto->getTipoProducto();  
                if ($tipoProducto == "importado") {              
                    $productosImportados += 1;                   
                }
            }
            // si en esta venta se vendió al menos un producto importado
            if ($productosImportados > 0) {
                $cantidadProductosImportados += $productosImportados; 
                $ventasConProductosImportados++;
            }
        }
    
        $promedio = 0;
        if ($ventasConProductosImportados != 0) {
            $promedio = $cantidadProductosImportados / $ventasConProductosImportados;
        }
        return $promedio;
    }
    
    public function informarConsumoCliente($tipoDoc , $numDoc) {
        $productosVendidos = []; 
        $colVentas = $this->getColVentas();
         foreach($colVentas as $venta) {
            $tipoDoc = $venta->getTipoDoc();
            $numeroDoc = $venta->getNumeroDoc();
            if ($tipoDoc ==  $tipoDoc && $numeroDoc == $numDoc) {
                $objetosVendidos = $venta->getColProductos();
                foreach ($objetosVendidos as $producto) {
                    array_push($productosVendidos , $producto);
                }
         }
    } 
    return $productosVendidos;
    }



    public function __toString() {
        return 
        "Coleccion de Productos Importados-> \n" . $this->mostrarProductosImportados() . "\n" .
        "Coleccion de Productos Regionales-> " . $this->mostrarProductosRegionales() . "\n" .
        "Coleccion de Ventas-> " . $this->mostrarColeccionVentas() . "\n";
    }

    public function mostrarProductosImportados () {
        $colProductos = $this->getColProductosImportados();
        $cadena = "";
        foreach ($colProductos as $producto) {
            $cadena .= $producto . "\n";
        }
        return $cadena;
    }
    public function mostrarProductosRegionales () {
        $colProductos = $this->getColProductosRegionales();
        $cadena = "";
        foreach ($colProductos as $producto) {
            $cadena .= $producto . "\n";
        }
        return $cadena;
    }
    public function mostrarColeccionVentas() {
        $colVentas = $this->getColVentas();
        $cadena = "";
        foreach ($colVentas as $venta) {
            $cadena .= $venta . "\n";
        }
        return $cadena;
    }

}

