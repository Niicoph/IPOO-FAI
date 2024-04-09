<?php 


class Banco {
    //atributos
    private $mostradores;
    private $cliente;
    private $tramitesAbiertos;  //[$tramite1 , $tramite2];  
    private $tramitesCerrados;  //[$tramite1 , $tramite2];

    // constructor
    public function __construct($coleccionMostradores , $objCliente) { 
        $this->mostradores = $coleccionMostradores;
        $this->cliente = $objCliente;
        $this->tramitesAbiertos = [];
        $this->tramitesCerrados = [];
    }
    //getters y setters
    public function getMostradores() {
        return $this->mostradores;
    }
    public function getTramitesAbiertos() {
        return $this->tramitesAbiertos;
    }
    public function getTramitesCerrados() { 
        return $this->tramitesCerrados;
    }
    public function setTramitesAbiertos($tramite) {
        $this->tramitesAbiertos = $tramite;
    }
    public function setTramitesCerrados($tramite) {
        $this->tramitesCerrados = $tramite;
    }

    public function getCliente() {
        return $this->cliente;
    }
    public function setMostradores($mostradores) {
        $this->mostradores = $mostradores;
    }
    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }
    public function mostradoresQueAtienden($tipoTramite) {  // $tramite = $objTramite = new Tramite()
        $coleccionMostradorPorTipoTramite = [];
        $coleccionMostradores = $this->getMostradores();
        foreach($coleccionMostradores as $mostrador) {
            if ($mostrador->getTipoTramite() == $tipoTramite) {
                array_push($coleccionMostradorPorTipoTramite, $mostrador);
            }
        }
        return $coleccionMostradorPorTipoTramite;
    }
    public function mejorMostradorPara($tipoTramite) {
        $coleccionMostradores = $this->getMostradores(); 
        $bandera = null;
        $minimoCola = null;
    
        foreach($coleccionMostradores as $mostrador) {
            if ($mostrador->getTipoTramite() == $tipoTramite) {            
                $cantidadPersonasEnFila = $mostrador->getClientesEnCola();  
                $limitePersonasEnFila = $mostrador->getLimiteCola();        
                if ($cantidadPersonasEnFila < $limitePersonasEnFila) {     
                    if ($minimoCola == null || $cantidadPersonasEnFila < $minimoCola) {  
                        $minimoCola = $cantidadPersonasEnFila;                          
                        $bandera = $mostrador;                                             
                    }
                }
            }
        }
        return $bandera;
    }
    public function atenderCliente($cliente) { 
        $tramiteCliente = $cliente->getObjTramite();
        $tipoTramiteCliente = $tramiteCliente->getTipoTramite();
        $respuesta =  $this->mejorMostradorPara($tipoTramiteCliente);
        if ($respuesta) {
            $this->ingresarTramite($tramiteCliente);
            $string = "Cliente Atendido";
        } else {
            $string = "será atendido en cuanto haya lugar en el mostrador";
        }
    return $string;
    }
   /* -----------metodos nuevos--------------  */
   public function ingresarTramite($objTramite) {
    $string = '';
    $estadoTramite = $objTramite->getEstado();
    if ($estadoTramite == 'abierto') {
        $tramitesAbiertos = $this->getTramitesAbiertos();
        array_push($tramitesAbiertos , $objTramite);
        $this->setTramitesAbiertos($tramitesAbiertos); // Asignar el array modificado de vuelta al atributo
    } else {
        $string = "El tramite ya ha sido atendido";
    }
    return $string;
}

   public function cerrarTramite($objTramite) {
         $estadoTramite = $objTramite->getEstado();
         if ($estadoTramite == "abierto") {
            $objTramite->setEstado("cerrado");
            $fechaCierre = getDate(); // obtiene un array con la fecha
            $horarioTramiteCierre = date("H:i:s"); // obtiene la hora en la que se cierra el tramite
            $objTramite->setFechaCierre($fechaCierre);  // actualizamos la fecha 
            $objTramite->setHorarioCierre($horarioTramiteCierre);  // actualizamos el horario
            $tramitesCerrados = $this->getTramitesCerrados();     // recuperamos el array con los tramites cerrados
            array_push($tramitesCerrados , $objTramite);          // almacenamos el tramite con los nuevos valores 
            $this->setTramitesCerrados($tramitesCerrados);
            $this->actualizarFechaTramiteAbierto($objTramite);
         } else {
            $string = "El tramite ya fue cerrado o no ha sido atendido";
         }
    return $string;
    }
    public function actualizarFechaTramiteAbierto($objTramite) {
        $estadoTramite = $objTramite->getEstado();
        if ($estadoTramite == "cerrado") {
            $tramitesAbiertos = $this->getTramitesAbiertos();
            $cantidadTramites = count($tramitesAbiertos);
            $idTramite = $objTramite->getIdTramite();
            $i = 0;
            $tramiteEncontrado = false;
            while ($i < $cantidadTramites && $tramiteEncontrado == false) {
               if ($tramitesAbiertos[$i]->getIdTramite() == $idTramite ) {
                   $tramiteEncontrado = true;
                   $fechaCierre = $objTramite->getFechaCierre();
                   $horarioCierre = $objTramite->gethorarioCierre();
                   $tramitesAbiertos[$i]->setFechaCierre($fechaCierre);
                   $tramitesAbiertos[$i]->setHorarioCierre($horarioCierre);
               }
               $i++;
            }
        } else {
            $string = "No es posible actualizar la fecha dado que el tramite no ha sido abierto";
        }
     return $string;
    }
}

