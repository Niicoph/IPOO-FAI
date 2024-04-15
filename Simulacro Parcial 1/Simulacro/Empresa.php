<?php 

/*
1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
*/


class Empresa {
    // atributos 
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentas;
    // constructor
    public function __construct($denominacion, $direccion , $coleccionClientes , $coleccionMotos , $coleccionVentas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionVentas = $coleccionVentas;
    }
    // getters y setters
    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getColeccionClientes() {
        return $this->coleccionClientes;
    }
    public function getColeccionMotos() {
        return $this->coleccionMotos;
    }
    public function getColeccionVentas() {
        return $this->coleccionVentas;
    }
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setColeccionCLientes($coleccionesClientes) {
        $this->coleccionClientes = $coleccionesClientes;
    }
    public function setColeccionMotos($coleccionMotos) {
        $this->coleccionMotos = $coleccionMotos;
    }
    public function setColeccionVentas($coleccionVentas) {
        $this->coleccionVentas = $coleccionVentas;
    }
    // metodos adicionales
    public function retornarMoto($codigoMoto) {
        $i = 0;
        $encontrado = false;
        $moto = null;
        $coleccionMotos = $this->getColeccionMotos();
        while ($i < count($coleccionMotos) && !$encontrado) {
            if ($coleccionMotos[$i]->getCodigo() == $codigoMoto) {
                $moto = $coleccionMotos[$i];
            }
            $i++;
        }
        return $moto;
    }
                                // [1,2,3,4,5]
    public function registrarVenta($colCodigosMoto , $objCliente) {        
            $venta = new Venta(rand() , "15-04-2024" , $objCliente , [] , 0); // creamos una nueva venta
            $cliente = $venta->verificarDisponibilidadCliente();
            if ($cliente) {
                $coleccionMotos = $this->getColeccionMotos(); // recuperamos todas las motos de la empresa
                foreach($coleccionMotos as $moto) {
                    $codigoMoto = $moto->getCodigo();
                    $i = 0;
                    $encontrado = false;
                    while ($i < count($colCodigosMoto) && !$encontrado) {
                        if ($colCodigosMoto[$i] == $codigoMoto) {
                            $encontrado = true;
                            $motoActiva = $moto->getActiva(); // true or false 
                            if ($motoActiva) {
                                $venta->incorporarMoto($moto); // agregamos la moto al array de ventas, ademas de sumar el precio de la moto al precio final de la venta
                            }
                        }
                        $i++;
                    }
                }
                if ($venta->getColeccionObjMotos() == []) {  // si la venta esta vacia es porque no se pudo realizar la venta
                    return "No se pudo realizar la venta, ninguna moto está disponible";
                } else {                                     // si la venta contiene elementos es porque se pudo realizar la venta
                    $coleccionVentas = $this->getColeccionVentas();       // se guarda la venta en la coleccion de ventas
                    $coleccionClientes = $this->getColeccionClientes();       // se guarda el cliente en la coleccion de clientes
                    array_push($coleccionClientes , $objCliente);  // se podria verificar que el cliente ya este en la coleccion, para no volver a agregarlo.
                    array_push($coleccionVentas , $venta);
                    $this->setColeccionClientes($coleccionClientes);
                    $this->setColeccionVentas($coleccionVentas);
                    return "Venta realizada con éxito " . $venta;
                }
            } else {
                return "El cliente está dado de baja, no puede realizar compras";
            }
    }
    public function retornarVentasXCliente($tipo,$numDoc) {
        $colClientes = $this->getColeccionClientes();
        if ($colClientes == []) {
            $respuesta = "No hay clientes registrados";
        } else {
            $i = 0;
            $encontrado = false;
            $cliente = null;
            while ($i < count($colClientes) && !$encontrado) {
                if ($colClientes[$i]->getTipoDocumento() == $tipo && $colClientes[$i]->getNumeroDocumento() == $numDoc) {
                    $cliente = $colClientes[$i];
                    $encontrado = true;
                }
                $i++;
            }
            if ($cliente) {
                $colVentas = $this->getColeccionVentas();
                $colVentasCliente = [];
                $dniCliente = $cliente->getNumeroDocumento();
                foreach($colVentas as $venta) {
                    $clienteVenta = $venta->getObjCliente();
                    $dniVenta = $clienteVenta->getNumeroDocumento();
                    if ($dniCliente == $dniVenta) {
                        array_push($colVentasCliente , $venta);
                    }
                }
                $respuesta = $colVentasCliente;
            }
        }
        return $respuesta;
    }
    // toString
    public function __toString() {
        $string = 
            "Denominacion: " . $this->getDenominacion() . "\n" . 
            "Direccion: " . $this->getDireccion() . "\n" . 
            "Coleccion Motos -> " . "\n" . 
            "--------------------------------" . "\n" .
            $this->mostrarColeccionMotos() . "\n" .
            "--------------------------------" . "\n" . 
            "Coleccion Clientes -> " . "\n" .
            "--------------------------------" . "\n" .
            $this->mostrarColeccionClientes() . "\n" .
            "--------------------------------" . "\n" .
            "Coleccion Ventas -> " . "\n" .
            "--------------------------------" . "\n" .
            $this->mostrarColeccionVentas() . "\n" .
            "--------------------------------" . "\n";
        return $string;
    }
    public function mostrarColeccionMotos() {
        $string = "";
        foreach ($this->getColeccionMotos() as $moto) {
            $string .= $moto . "\n";
        }
        return $string;
    }
    public function mostrarColeccionClientes() {
        $string = "";
        foreach ($this->getColeccionClientes() as $cliente) {
            $string .= $cliente . "\n";
        }
        return $string;
    }
    public function mostrarColeccionVentas() {
        $string = "";
        foreach ($this->getColeccionVentas() as $venta) {
            $string .= $venta . "\n";
        }
        return $string;
    }
    
}

