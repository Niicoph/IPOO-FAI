<?php 


include_once 'Pasajero.php';

class PasajeroNecesidad extends Pasajero { 
    // atributos 
    private $servicioEspecial; // true or false
    private $asistenciaEmbarque; // true or false
    private $comidaEspecial;  // true or false 
    // constructor -> ($nombre, $numeroAsiento , $numeroTicketPasaje)
    public function __construct($nombre,$numeroAsiento, $numeroTicketPasaje , $servicioEspecial , $asistenciaEmbarque , $comidaEspecial) {
        parent::__construct($nombre,$numeroAsiento, $numeroTicketPasaje);
        $this->servicioEspecial = $servicioEspecial;
        $this->asistenciaEmbarque = $asistenciaEmbarque;
        $this->comidaEspecial = $comidaEspecial;
    }
    // getters y setters
    public function getServicioEspecial() {
        return $this->servicioEspecial;
    }
    public function getAsistenciaEmbarque() {
        return $this->asistenciaEmbarque;
    }
    public function getComidaEspecial() {
        return $this->comidaEspecial;
    }
    public function setServicioEspecial($condicionServicio) {
        $this->servicioEspecial = $condicionServicio;
    }
    public function setAsistenciaEmbarque($condicionAsistencia) {
        $this->asistenciaEmbarque = $condicionAsistencia;
    }
    public function setComidaEspecial($condicionAsistencia) {
        $this->comidaEspecial = $condicionAsistencia;
    }
    // metodos adicionales

    public function darPorcentajeIncremento() {
        $porcentajeIncremento = 0;
        $servicioEspecial = $this->getServicioEspecial();
        $asistenciaEmbarque = $this->getAsistenciaEmbarque();
        $comidaEspecial = $this->getComidaEspecial();
        if ($asistenciaEmbarque == true && $servicioEspecial == true && $comidaEspecial == true) {
            $porcentajeIncremento = 30;
        } else if ($servicioEspecial == true )  {
            $porcentajeIncremento = 10;
        } else if  ($asistenciaEmbarque == true) {
            $porcentajeIncremento = 10;
        } else if ($comidaEspecial == true) {
            $porcentajeIncremento = 10;
        }
        return $porcentajeIncremento;
    }

    // toString
    public function __toString() {
        return (string) 
        parent::__toString() . "\n" .
        "Servicio Especial: " . $this->getServicioEspecial() . "\n" .
        "Asistencia de Embarque: " . $this->getAsistenciaEmbarque() . "\n" .
        "Comida Especial: " . $this->getComidaEspecial() . "\n";
    }
}