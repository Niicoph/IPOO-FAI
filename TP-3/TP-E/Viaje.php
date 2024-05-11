<?php 


include_once 'Pasajero.php';
include_once 'PasajeroNecesidad.php';
include_once 'PasajeroVIP.php';


class Viaje { 
    // atributos
    private $codigoViaje;
    private $destino;
    private $cantidadMaximaPasajeros;
    private $coleccionPasajeros;   
    private $responsableViaje;
    private $costoViaje;
    private $sumaPasajesVendidos;  
    // constructor 
    public function __construct($codigoViaje , $destino , $cantidadMaximaPasajeros , $coleccionPasajeros , $responsableViaje , $costoViaje) {
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
        $this->coleccionPasajeros = $coleccionPasajeros;
        $this->responsableViaje = $responsableViaje;
        $this->costoViaje = $costoViaje;
        $this->sumaPasajesVendidos = 0;
    }
    // getters
    public function getCodigoViaje() {
        return $this->codigoViaje;
    }
    public function getDestinoViaje() {
        return $this->destino;
    }
    public function getCantidadMaximaPasajeros() {
        return $this->cantidadMaximaPasajeros;
    }
    public function getColeccionPasajeros() {
        return $this->coleccionPasajeros;
    }
    public function getResponsableViaje() {
        return $this->responsableViaje;
    }
    public function getCostoViaje() {
        return $this->costoViaje;
    }
    public function getSumaPasajesVendidos() {
        return $this->sumaPasajesVendidos;
    }
    // setters
    public function setCodigoViaje($codigo) {
    	$this->codigoViaje = $codigo;
    }
    public function setDestinoViaje($destino) {
    	$this->destino = $destino;
    }
    public function setCantidadMaximaPasajeros($num) {
    	$this->cantidadMaximaPasajeros = $num;
    }
    public function setColeccionPasajeros($coleccion) {
    	$this->coleccionPasajeros = $coleccion;
    }
    public function setResponsableViaje($responsableViaje) {
        $this->responsableViaje = $responsableViaje;
    }
    public function setCostoViaje($costo) {
        $this->costoViaje = $costo;
    }
    public function setSumaPasajesVendidos($suma) {
        $this->sumaPasajesVendidos = $suma;
    }
                                       
  
    public function hayPasajeDisponible() {
        $disponibilidad = false;
        $cantidadMaxima = $this->getCantidadMaximaPasajeros();
        $cantidadActual = count($this->coleccionPasajeros);
        if ($cantidadMaxima > $cantidadActual) {
           $disponibilidad = true;
        }
        return $disponibilidad;
    }
    public function agregarPasajero($objPasajero) {
        $coleccionPasajeros = $this->getColeccionPasajeros();
        array_push($coleccionPasajeros , $objPasajero);
        $this->setColeccionPasajeros($coleccionPasajeros);
        return true;
    }
    public function venderPasaje($objPasajero) {
        $coleccionPasajeros = $this->getColeccionPasajeros();
        $numeroTicket = $objPasajero->getNumeroTicketPasaje();
        $disponibilidad = $this->hayPasajeDisponible(); // true if there is availability
        $importeFinal = 0; // Inicializar el importe final
        
        if ($disponibilidad) {
            $i = 0;
            $pasajeVendido = false;
            
            // Verificar si el pasaje ya ha sido vendido
            while ($i < count($coleccionPasajeros) && $pasajeVendido == false) {
                if ($coleccionPasajeros[$i]->getNumeroTicketPasaje() == $numeroTicket) {
                    $pasajeVendido = true;
                }
                $i++;
            }
            
            // Si el pasaje no ha sido vendido, proceder a venderlo
            if (!$pasajeVendido) {
                $this->agregarPasajero($objPasajero);
                
                if ($objPasajero instanceof PasajeroVIP || $objPasajero instanceof PasajeroNecesidad) {
                    $importeBase = $this->getCostoViaje();
                    $porcentaje = $objPasajero->darPorcentajeIncremento();
                    $importeIncrementar = ($porcentaje * $importeBase) / 100;
                    $importeFinal = $importeBase + $importeIncrementar;
                } else {
                    $importeFinal = $this->getCostoViaje();
                }
                // Incrementar el contador de pasajes vendidos
                $sumaPasajesVendidos = $this->getSumaPasajesVendidos();
                $sumaPasajesVendidos++;
                $this->setSumaPasajesVendidos($sumaPasajesVendidos);
            }
        }
        
        return $importeFinal;
    }
    
    public function __toString() {
        return (string)
        "Codigo de Viaje: " . $this->getCodigoViaje() . "\n" .
        "Destino: " . $this->getDestinoViaje() . "\n" .
        "Cantidad Maxima de Pasajeros: " . $this->getCantidadMaximaPasajeros() . "\n" .
        "Responsable del Viaje: " . $this->getResponsableViaje() . "\n" .
        "Costo del Viaje: " . $this->getCostoViaje() . "\n" .
        "Suma de Pasajes Vendidos: " . $this->getSumaPasajesVendidos() . "\n" .
        "Pasajeros -> " . "\n" . $this->mostrarPasajeros() . "\n";
    }

    public function mostrarPasajeros() {
        $coleccionPasajeros = $this->getColeccionPasajeros();
        $string = "";
        foreach ($coleccionPasajeros as $pasajero) {
            $string .= $pasajero . "\n";
        }
        return $string;
    }
}
