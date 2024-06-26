<?php 


/*

En un banco existen varios mostradores. Cada mostrador puede atender cierto tipo de trámites y tiene una cola
de clientes, que no puede superar un número determinado para cada cola, de cada cola se conoce el número
actual de personas que hay en ella. Cada cliente concurre al banco para realizar un solo trámite. Un trámite
tiene un horario de creación y un horario de resolución. Implemente los siguientes métodos:

a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos
de las clases.
b) Los métodos de acceso de cada uno de los atributos de las clases.
c) Redefinir el método _ _toString() para que retorne la información de los atributos de las clases.
d) mostrador–>atiende($unTramite): devuelve true o false indicando si el tramite se puede atender o no
en el mostrador; note que el tipo de trámite correspondiente a unTramite tiene que coincidir con
alguno de los tipos de trámite que atiende el mostrador.
e) banco–>mostradoresQueAtienden($unTramite): retorna la colección de todos los mostradores que
atienden ese trámite.
f) banco–>mejorMostradorPara($unTramite): retorna el mostrador con la cola más corta con espacio
para al menos una persona más y que atienda ese trámite; si ningun mostrador tiene espacio, retorna
null.
g) banco–>atender($unCliente): cuando llega un cliente al banco se lo ubica en el mostrador que atienda
el trámite que el cliente requiere, que tenga espacio y la menor cantidad de clientes esperando; si no
hay lugar en ningún mostrador debe retornar un mensaje que diga al cliente que “será antendido en
cuanto haya lugar en un mostrador”


*/


class Banco {
    //atributos
    private $mostradores;
    private $cliente;
    // constructor
    public function __construct($coleccionMostradores , $objCliente) { 
        $this->mostradores = $coleccionMostradores;
        $this->cliente = $objCliente;
    }
    //getters y setters
    public function getMostradores() {
        return $this->mostradores;
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
    public function mostradoresQueAtienden($tipoTramite) {  
        $coleccionMostradorPorTipoTramite = [];
        $coleccionMostradores = $this->getMostradores(); // [$mostrador1,$mostrador2,$mostrador3] // $mostrador1 = new Mostrador('tipoTramite')
        foreach($coleccionMostradores as $mostrador) {
            if ($mostrador->getTipoTramite() == $tipoTramite) {
                array_push($coleccionMostradorPorTipoTramite, $mostrador);
            }
        }
        return $coleccionMostradorPorTipoTramite;
    }
    public function mejorMostradorPara($tipoTramite) {
        $coleccionMostradores = $this->getMostradores(); 
        $x = null;
        $minimoCola = null;
    
        foreach($coleccionMostradores as $mostrador) {  // iteramos sobre cada mostrador de la coleccion de mostradores 
            if ($mostrador->getTipoTramite() == $tipoTramite) {  // si el tipo de tramite del mostrador coincide con el pasado por parametro entras al if   
                $cantidadPersonasEnFila = $mostrador->getClientesEnCola();   // obtenes la cantidad de gente que hay en la cola
                $limitePersonasEnFila = $mostrador->getLimiteCola();        // obtenes el limite maximo de gente posible en cola
                if ($cantidadPersonasEnFila < $limitePersonasEnFila) {     // si cantidad de gente en cola es menor que el limite de gente posible entras al if
                    if ($minimoCola == null || $cantidadPersonasEnFila < $minimoCola) {  // si el minimo es nulo o la cantidad de gente en cola es menor que el minimo
                        $minimoCola = $cantidadPersonasEnFila;                          // el minimo comienza a valer la cantidad de gente en cola
                        $x = $mostrador;                                                // guardas el mostrador con x personas
                    }
                }
            }
        }
        return $x;
    }
    public function atenderCliente($cliente) { 
        $tramiteCliente = $cliente->getObjTramite();
        $tipoTramiteCliente = $tramiteCliente->getTipoTramite();
        $respuesta =  $this->mejorMostradorPara($tipoTramiteCliente);
        if ($respuesta) {
            // cambiar horario? 
            $string = "Cliente atendido";
        } else {
            $string = "será atendido en cuanto haya lugar en el mostrador";
        }
    return $string;
    }
}

