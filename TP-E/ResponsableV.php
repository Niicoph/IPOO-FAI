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

class ResponsableV {
    // atributos
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;
    // constructor
    public function __construct($numeroEmpleado , $numeroLicencia , $nombre , $apellido) {
        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
    // getters y setters
    public function  getNumeroEmpleado() {
        return $this->numeroEmpleado;
    }
    public function getNumeroLicencia() {
        return $this->numeroLicencia;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function setNumeroEmpleado($numeroEmpleado) {
        $this->numeroEmpleado = $numeroEmpleado;
    }
    public function setNumeroLicencia($numeroLicencia) {
        $this->numeroLicencia = $numeroLicencia;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function __toString() {
        $string = 
        "Numero de Empleado: " . $this->numeroEmpleado . "\n" .
        "Numero de Licencia: " . $this->numeroLicencia . "\n" .
        "Nombre: " . $this->nombre . "\n" .
        "Apellido: " . $this->apellido . "\n";
        return $string;
    }
}