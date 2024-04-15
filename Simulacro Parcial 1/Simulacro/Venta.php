<?php 

/*

1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.

*/


class Venta {
    //atributos
    private $numero;
    private $fecha;
    private $objCliente;
    private $coleccionObjMotos;
    private $precioFinal;
    // constructor                                       // array de motos que el cliente quiere comprar
    public function __construct($numero , $fecha , $objCliente , $coleccionObjMotos , $precioFinal) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->coleccionObjMotos = $coleccionObjMotos;
        $this->precioFinal = $precioFinal;
    }
    // getters y setters
    public function getNumero() {
        return $this->numero;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getObjCliente() {
        return $this->objCliente;
    }
    public function getColeccionObjMotos() {
        return $this->coleccionObjMotos;
    }
    public function getPrecioFinal() {
        return $this->precioFinal;
    }
    public function setNumero($numero) {
        $this->numero = $numero;
    } 
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setObjCliente($objCliente) {
        $this->objCliente = $objCliente;
    }
    public function setColeccionObjMotos($coleccionObjMotos) {
        $this->coleccionObjMotos = $coleccionObjMotos;
    }
    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }
    // metodos adicionales


    public function verificarDisponibilidadCliente() {
        $cliente = $this->getObjCliente();
        $estado = false;
        if ($cliente->getEstado() == "activo") {
            $estado = true;
        } else {
            $estado = false;
        }
        return $estado; // devuelve true si el cliente está activo y false si está dado de baja
    }
 
    public function incorporarMoto($objMoto) {
        $motos = $this->getColeccionObjMotos();
        $condicionCliente = $this->verificarDisponibilidadCliente();
        if ($condicionCliente) {
             $condicionMoto = $objMoto->getActiva();
             if ($condicionMoto) {
                array_push($motos , $objMoto); // agregamos la moto a la coleccion de motos que serian vendidas
                $this->setColeccionObjMotos($motos);
                $precioMoto = $objMoto->darPrecioVenta();
                $precioFinal = $this->getPrecioFinal();
                $precioFinal += $precioMoto;
                $this->setPrecioFinal($precioFinal);
                $respuesta = "Moto incorporada a la venta";
             } else {
                $respuesta =  "La moto no está disponible para la venta";
             }
        } else {
            $respuesta = "El cliente está dado de baja, no puede realizar compras";
        }
        return $respuesta;
    }

    

    // toString
    public function __toString() {
        $string = 
            "Numero: " . $this->getNumero() . "\n" . 
            "Fecha: " . $this->getFecha() . "\n" . 
            "Precio Final: " . $this->getPrecioFinal() . "\n" . 
            "Cliente -> " . $this->getObjCliente() . "\n";
        return $string;
    }
}
