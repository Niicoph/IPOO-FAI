<?php 

include_once 'PaqueteTuristico.php';
include_once 'VentaOnline.php';
include_once 'Venta.php';
include_once 'Cliente.php';

class Agencia {
    // atributos
    private $colPaquetesTuristicos;
    private $colVentasAgencia;
    private $colVentasOnline;
    // constructor
    public function __construct($colPaquetesTuristicos , $colVentasAgencia , $colVentasOnline) {
        $this->colPaquetesTuristicos = $colPaquetesTuristicos; 
        $this->colVentasAgencia = $colVentasAgencia;
        $this->colVentasOnline = $colVentasOnline;
    }
    // getters y setters
    public function getColPaquetesTuristicos() {
        return $this->colPaquetesTuristicos;
    }
    public function getColVentasAgencia() {
        return $this->colVentasAgencia;
    }
    public function getVentasOnline() {
        return $this->colVentasOnline;
    }
    public function setColPaquetesTuristicos($colPaquetesTuristicos) {
        $this->colPaquetesTuristicos = $colPaquetesTuristicos;
    }
    public function setColVentasAgencia($colVentasAgencia) {
        $this->colVentasAgencia = $colVentasAgencia;
    }
    public function setColVentasOnline($colVentasOnline) {
        $this->colVentasOnline = $colVentasOnline;
    }
    // metodos adicionales
    
    public function incorporarPaquete($objPaqueteTuristico) {
        $coleccionPaquetes = $this->getColPaquetesTuristicos();

        $fechaEntrante = $objPaqueteTuristico->getFechaDesde(); // fecha del paquete turistico param
        $idDestinoEntrante = $objPaqueteTuristico->getObjDestino()->getId(); // id del destino del paquete turistico param

        // se puede agregar siempre y cuando no haya un paquete en la misma fecha al mismo destino
        $encontrado = true;
        $i = 0;
        while ($i < count($coleccionPaquetes) && $encontrado == true) {
            // verificar que el paquete no este previamente registrado , si la fecha y el destino coinciden no se puede agregar
            if ($idDestinoEntrante == $coleccionPaquetes[$i]->getObjDestino()->getId() && $fechaEntrante == $coleccionPaquetes[$i]->getFechaDesde()) {
                $encontrado = false;
            }
            $i++;
        }
        // if $encontrado -> agregar paquete
        if ($encontrado == true) {
            array_push($coleccionPaquetes , $objPaqueteTuristico);
            $this->setColPaquetesTuristicos($coleccionPaquetes);
        }
        return $encontrado;
    }
                  
    public function incorporarVenta($objPaquete , $numDoc , $tipoDoc , $cantidadPersonas , $esOnline) {     
        $importe = -1;
        $fechaActual = date('Y-m-d');
        $objCliente = new Cliente($numDoc , $tipoDoc);
        $paqueteIncorporado = $this->incorporarPaquete($objPaquete); 
        $lugarDisponiblePaquete = $objPaquete->getCantidadDisponiblesPlazas(); // 10  >= 11
        if ($lugarDisponiblePaquete >= $cantidadPersonas && $paqueteIncorporado == true) {
            if ($esOnline) {
                $porcentajeDescuento = 20;
                // ($fecha, $objPaquete , $cantidadPersonas , $objCliente , $porcentajeDescuento) 
                $ventaOnline = new VentaOnline($fechaActual , $objPaquete , $cantidadPersonas , $objCliente , $porcentajeDescuento );
                $colVentasOnlines = $this->getVentasOnline();
                array_push($colVentasOnlines , $ventaOnline);
                $this->setColVentasOnline($colVentasOnlines);
                $importe = $ventaOnline->darImporteVenta();
            } else {
                // ($fecha, $objPaquete , $cantidadPersonas, $objCliente)
                $venta = new Venta($fechaActual , $objPaquete , $cantidadPersonas , $objCliente);
                $colVentasAgencia = $this->getColVentasAgencia();
                array_push($colVentasAgencia , $venta);
                $this->setColVentasAgencia($colVentasAgencia);
                $importe = $venta->darImporteVenta();
            }
        }
        return $importe;
    }

    public function informarPaquetesTuristicos($fecha, $destino){
        $colPaquetes = $this->getColPaquetesTuristicos();
        $colPaquetesEnFecha = [];
        foreach($colPaquetes as $paquete){
            $destinoId = $paquete->getObjDestino()->getId();
            $fechaDesde = $paquete->getFechaDesde();
            if ($destinoId == $destino->getId() && $fechaDesde == $fecha) {
                array_push($colPaquetesEnFecha, $paquete);
            }
        }
        return $colPaquetesEnFecha;
    } 

    public function paqueteMasEconomico($fecha, $destino) {
        $colVentasOnline = $this->getVentasOnline();
        $colVentasAgencia = $this->getColVentasAgencia();
        $importeInicial = PHP_INT_MAX; // Valor máximo permitido para enteros en PHP
        if (isset($colVentasOnline)) {
            foreach ($colVentasOnline as $ventaOnline) {
                $fechaPaquete = $ventaOnline->getObjPaqueteTuristico()->getFechaDesde();
                $destinoIdPaquete = $ventaOnline->getObjPaqueteTuristico()->getObjDestino()->getId();
                if ($fecha == $fechaPaquete && $destinoIdPaquete == $destino->getId()) {
                    $importePaquete = $ventaOnline->darImporteVenta();
                    if ($importePaquete <= $importeInicial) { 
                        $importeInicial = $importePaquete;
                    }
                }
            }
        }
        if (isset($colVentasAgencia)) {
            foreach ($colVentasAgencia as $ventaAgencia) {
                $fechaPaquete = $ventaAgencia->getObjPaqueteTuristico()->getFechaDesde();
                $destinoIdPaquete = $ventaAgencia->getObjPaqueteTuristico()->getObjDestino()->getId();
                if ($fecha == $fechaPaquete && $destinoIdPaquete == $destino->getId()) {
                    $importePaquete = $ventaAgencia->darImporteVenta(); 
                    if ($importePaquete <= $importeInicial) {
                        $importeInicial = $importePaquete;
                    }
                }
            }
        }
        return $importeInicial;
    }

    public function informarPaquetesMasVendido($anio , $n) {
        
    }



    // toString
    public function __toString() {
        return (string) 
        "Paquetes Turisticos: " . $this->mostrarColeccionPaquetesTuristicos() . "\n" .
        "Ventas Agencia: " . $this->mostrarColeccionVentasAgencia() . "\n" .
        "Ventas Online: " . $this->mostrarColeccionVentasOnline() . "\n";
    }

    // metodos para mostrar colecciones
    public function mostrarColeccionVentasOnline() {
        $colVentasOnline = $this->getVentasOnline();
        $string = "";
        foreach ($colVentasOnline as $venta) {
            $string .= $venta . "\n";
        }
        return $string;
    }
    public function mostrarColeccionPaquetesTuristicos() {
        $colPaquetesTuristicos = $this->getColPaquetesTuristicos();
        $string = "";
        foreach ($colPaquetesTuristicos as $paquete) {
            $string .= $paquete . "\n";
        }
        return $string;
    }
    public function mostrarColeccionVentasAgencia() {
        $colVentasAgencia = $this->getColVentasAgencia();
        $string = "";
        foreach ($colVentasAgencia as $venta) {
            $string .= $venta . "\n";
        }
        return $string;
    }

}