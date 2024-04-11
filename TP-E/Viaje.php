<?php 

/*

La empresa de transportes de pasajeros "Viaje Feliz" quiere registrar la informacion referente de sus viajes. 
De cada viaje se precisa almacenar el codigo del mismo, destino, cantidad maximas de pasajeros y los pasajeros del viaje.
Realice la implementacion de la clase Viaje e implemente los metodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros).
Utilice clases y arreglos para almacenar la informacion correspondiente a los pasajeros. Cada pasajero guarda su "nombre" , "apellido" y "numero de documento".
Implementar un script testViaje.php que cree una instacia de la clase Viaje y presente un menu que permita cargar la informacion del viaje, modificar y ver sus datos.

---- Segundas Implementaciones ----

Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y telefono.
El viaje ahora contiene una referencia a una coleccion de objetos de la clase Pasajero. Tambien se desea guardar la informacion de la persona responsable de 
realizar el viaje. Para ello cree una clase ResponsableV que registre el numero de empleado, numero de licencia, nombre y apellido. La clase viaje debe hacer 
referencia al responsable de realizar el viaje.
Implementar las operaciones que permiten modificar el nombre, apellido y telefono de un pasajero. 
Luego implementar la operacion que agrega los pasajeros al viaje, solicitando por consola la informacion de los mismos. 
Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la informacion del responsable del viaje.


*/

class Viaje { 
    // atributos
    private $codigoViaje;
    private $destino;
    private $cantidadMaximaPasajeros;
    private $coleccionPasajeros;   
    private $objResponsableViaje;
    // constructor 
    public function __construct($codigoViaje , $destino , $cantidadMaximaPasajeros , $coleccionPasajeros , $responsableViaje) {
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
        $this->coleccionPasajeros = $coleccionPasajeros;
        $this->objResponsableViaje = $responsableViaje;
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
        return $this->objResponsableViaje;
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
        $this->objResponsableViaje = $responsableViaje;
    }
    // métodos                                            
    public function buscarPasajero($documento) {
        $coleccionPasajeros = $this->coleccionPasajeros;
        $pasajero = null;
        $index = 0;
        $encontrado = false;
        $i = 0;
        while( $i < count($coleccionPasajeros) && $encontrado == false ) {
            if ($coleccionPasajeros[$i]->getDocumento() == $documento) {
                $pasajero = $coleccionPasajeros[$i];
                $index = $i;
                $encontrado = true;
            }
            $i++;
        }
        return ["Pasajero" => $pasajero , "Index" => $index];
    }
    public function modificarNombrePasajero($nombre , $objPasajero) {
        $objPasajero->setNombre($nombre);
    }
    public function modificarApellidoPasajero($apellido , $objPasajero) {
        $objPasajero->setApellido($apellido);
    }
    public function modificarTelefonoPasajero($telefono , $objPasajero) {
        $objPasajero->setTelefono($telefono);
    }
    public function modificarDocumentoPasajero($documento , $objPasajero) {
        $objPasajero->setDocumento($documento);
    }
    public function verificarDisponibilidad() {
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
        $string = "Pasajero Agregado Correctamente";
        return $string;
    }
    public function eliminarPasajero($documento) {
        $pasajero = $this->buscarPasajero($documento);
        if ($pasajero["Pasajero"]) {
            $index = $pasajero["Index"];
            $coleccionPasajeros = $this->getColeccionPasajeros();
            array_splice($coleccionPasajeros , $index , 1);
            $this->setColeccionPasajeros($coleccionPasajeros);
            $string = "Pasajero Eliminado Correctamente";
        } else {
            $string = "No se encontro el pasajero";
        }
        return $string;
    }
    public function __toString() {
        $cantidadPasajeros = count($this->coleccionPasajeros);
        $string = 
            "Codigo de Viaje: " . $this->codigoViaje . "\n" . 
            "Destino: " . $this->destino . "\n" .
            "Cantidad Maxima de Pasajeros: " . $this->cantidadMaximaPasajeros . "\n" .
            "Pasajeros: " . $cantidadPasajeros . "\n" .
            "Responsable del Viaje => \n" .  $this->objResponsableViaje . "\n";
        return $string;
    }
}
