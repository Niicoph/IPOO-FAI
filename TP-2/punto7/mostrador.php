<?php 



class Mostrador {
    // atributos 
    private $tipoTramite; 
    private $limiteCola;
    private $clientesEnCola;
    // constructor
    public function __construct($tipoTramite , $limiteCola , $clientesEnCola) { 
        $this->tipoTramite = $tipoTramite;
        $this->limiteCola = $limiteCola;
        $this->clientesEnCola = $clientesEnCola;
    }
    // getters y setters
    public function getTipoTramite() {
        return $this->tipoTramite;
    }
    public function getLimiteCola() {
        return $this->limiteCola;
    }
    public function getClientesEnCola() {
        return $this->clientesEnCola;
    }
    public function setTipoTramite($tramite) {
        $this->tipoTramite = $tramite;
    }
    public function setLimiteCola($limiteX) {
        $this->limiteCola = $limiteX;
    }
    public function setClientesEnCola($clientes) {
        $this->clientesEnCola = $clientes;
    }
    // métodos
    public function atiende($tramite) {  
        $tipoTramite = $this->getTipoTramite();
        $atenderTramite = false;
        if ($tipoTramite == $tramite) {
            $atenderTramite = true;
        }
        return $atenderTramite;
    }
    /* ---------metodos nuevos------- */
    public function cantTramitesAntendidosMes() {

    }
    
}
