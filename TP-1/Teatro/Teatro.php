<?php 

/*
Un teatro se caracteriza por su nombre y su dirección y en él se realizan 4 funciones al día. Cada función tiene
un nombre y un precio. Realice el diseño de la clase Teatro e indique qué métodos tendría que tener la clase,
teniendo en cuenta que se pueda cambiar el nombre del teatro y la dirección, el nombre de un función y el
precio. Implementar las 4 funciones usando array de array asociativo. Cada función es un array asociativo con
las claves “nombre” y “precio”
*/


class Teatro {
    // Atributos
    private $funcion;   // ["nombre" => x  , "precio" => y]
    private $nombreTeatro;
    private $direccionTeatro;
    // Constructor 
    public function __construct($nombreTeatro , $direccionTeatro , $nombreFuncion , $precioFuncion) {
        $this->funcion["nombre"] = $nombreFuncion;
        $this->funcion["precio"] = $precioFuncion;
        $this->nombreTeatro = $nombreTeatro;
        $this->direccionTeatro = $direccionTeatro;
    }
    // getters y setters
    public function getNombreFuncion() {
        return $this->funcion["nombre"];
    }
    public function getPrecioFuncion() {
        return $this->funcion["precio"];
    }
    public function getNombreTeatro() {
        return $this->nombreTeatro;
    }
    public function getDireccionTeatro() {
        return $this->direccionTeatro;
    }
    public function setNombreFuncion($nF) {
        return $this->funcion["nombre"] = $nF;
    }
    public function setPrecioFuncion($pF) {
        return $this->funcion["precio"] = $pF;
    }
    public function setNombreTeatro($nT) {
        return $this->nombreTeatro = $nT;
    }
    public function setDireccionTeatro($dT) {
        return $this->direccionTeatro = $dT;
    }
    // métodos
    public function cambiarNombreTeatro($nT) {
        $nombreActual = $this->getNombreTeatro();
        if ($nT == $nombreActual) {
            echo "Nombre en uso. Escoja otro.";
        } else {
            $this->setNombreTeatro($nT);
            echo "Nombre del teatro actualizado con exito.";
        }
    }
    public function cambiarDireccionTeatro($dT) {
        $direccionActual = $this->getDireccionTeatro();
        if ($dT == $direccionActual) {
            echo "Direccion en uso. Escoja otra.";
        } else {
            $this->setDireccionTeatro($dT);
            echo "Direccion del teatro actualizada con exito.";
        }
    }
    public function cambiarNombreFuncion($nF) {
        $nombreActual = $this->getNombreFuncion();
        if ($nombreActual == $nF) {
            echo "Nombre en uso. Escoja otro.";
        } else {
            $this->setNombreFuncion($nF);
            echo "Nombre de la funcion actualizado con exito";
        }
    }
    public function cambiarPrecioFuncion($pF) {
        $precioActual = $this->getPrecioFuncion();
        if ($precioActual == $pF) {
            echo "El precio a actualizar es el mismo.";
        } else {
            $this->setPrecioFuncion($pF);
            echo "Precio de la funcion actualizado con exito";
        }
    }
    public function __toString() {
        return "Nombre del teatro: " . $this->getNombreTeatro() . " Direccion del teatro: " . $this->getDireccionTeatro() . " Precio de la funcion: " . $this->getPrecioFuncion()  ;
    }
}
