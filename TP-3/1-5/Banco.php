<?php 


include 'CuentaCorriente.php';
include 'CajaAhorro.php';


class Banco {
    // Atributos
    private $coleccionCuentaCorriente;
    private $coleccionCajaAhorro;
    private $ultimoValorCuentaAsignado;
    private $coleccionCliente;
    // Constructor 
    public function __construct($colCuentaCorriente, $colCajaAhorro, $ultimoValorCuenta ,  $colClientes) {
        $this->coleccionCuentaCorriente = $colCuentaCorriente;
        $this->coleccionCajaAhorro = $colCajaAhorro;
        $this->ultimoValorCuentaAsignado = $ultimoValorCuenta;
        $this->coleccionCliente = $colClientes;
    }
    // getters  y setters
    public function getColeccionCuentaCorriente() {
        return $this->coleccionCuentaCorriente;
    }
    public function getColeccionCajaAhorro() {
        return $this->coleccionCajaAhorro;
    }
    public function getUltimoValorCuentaAsignado() {
        return $this->ultimoValorCuentaAsignado;
    }
    public function getColeccionClientes() {
        return $this->coleccionCliente;
    }
    public function setColeccionCuentaCorriente($colCuentaCorriente) {
        $this->coleccionCuentaCorriente = $colCuentaCorriente;
    }
    public function setColeccionCajaAhorro($colCajaAhorro) {
        $this->coleccionCajaAhorro = $colCajaAhorro;
    }
    public function setUltimoValorCuentaAsignado($ultimoValorCuenta) {
        $this->ultimoValorCuentaAsignado = $ultimoValorCuenta;
    }
    public function setColeccionClientes($colClientes) {
        $this->coleccionCliente = $colClientes;
    }
    // metodos 
    public function incorporarCliente($objCliente) {
        // verificar si el cliente se encuenta previamente
        $existe = false; 
        $i = 0;
        $colCLientes = $this->getColeccionClientes();
        while ($i < count($colCLientes) && !$existe) {
            if ($colCLientes[$i]->getDni() == $objCliente->getDni()) {
                $existe = true;
            }
            $i++;
        }
        if (!$existe) {
            array_push($colCLientes, $objCliente);  // agregamos
            $this->setColeccionClientes($colCLientes); // actualizamos
        }
    }
    public function  incorporarCuentaCorriente($numeroCliente , $montoDescubierto) {
        $colClientes = $this->getColeccionClientes();
        $i = 0;
        $encontrado = false;
        while ($i < count($colClientes) && !$encontrado) {
            if ($colClientes[$i]->getNumeroCliente() == $numeroCliente) {
                $encontrado = true;
                $cliente = $colClientes[$i];
            }
            $i++;
        }
        if ($encontrado) {
            $colCuentasCorrientes = $this->getColeccionCuentaCorriente();
            $objCliente = $cliente;
            $saldoInicial = 0;
            $cuentaNueva = new CuentaCorriente($objCliente , $saldoInicial , $montoDescubierto);  // $objCliente , $saldo ,  $montoMaximoDescubierto
            array_push($colCuentasCorrientes, $cuentaNueva);
            $this->setColeccionCuentaCorriente($colCuentasCorrientes);
        }
        return $colCuentasCorrientes; // devuelve la coleccion con la cuenta nueva.
    }
    public function incorporarCajaAhorro($numeroCliente) {
        $colClientes = $this->getColeccionClientes();
        $i = 0;
        $encontrado = false;
        while ($i < count($colClientes) && !$encontrado) {
            if ($colClientes[$i]->getNumeroCliente() == $numeroCliente) {
                $encontrado = true;
                $cliente = $colClientes[$i];
            }
            $i++;
        }
        if ($encontrado) {
            $colCajasAhorro = $this->getColeccionCajaAhorro();
            $objCliente = $cliente;
            $saldoInicial = 0;
            $cuentaNueva = new CajaAhorro($objCliente , $saldoInicial);  
            array_push($colCajasAhorro, $cuentaNueva);
            $this->setColeccionCajaAhorro($colCajasAhorro);
        }
        return $colCajasAhorro; // devuelve la coleccion con la cuenta nueva.
    }
    public function realizarDeposito($numCuenta , $monto) {
        $colCuentasCorrientes = $this->getColeccionCuentaCorriente();
        $colCajasAhorro = $this->getColeccionCajaAhorro();
        $i = 0;
        $encontrado = false;
        while ($i < count($colCuentasCorrientes) && !$encontrado) {
            if ($colCuentasCorrientes[$i]->getNumeroCuenta() == $numCuenta) {
                $encontrado = true;
                $cuenta = $colCuentasCorrientes[$i];
            }
            $i++;
        }
        if (!$encontrado) {
            $i = 0;
            while ($i < count($colCajasAhorro) && !$encontrado) {
                if ($colCajasAhorro[$i]->getNumeroCuenta() == $numCuenta) {
                    $encontrado = true;
                    $cuenta = $colCajasAhorro[$i];
                }
                $i++;
            }
        }
        if ($encontrado) {
            $cuenta->depositar($monto);
        }
    }
    public function realizarRetiro($numCuenta , $monto) {
        $colCuentasCorrientes = $this->getColeccionCuentaCorriente();
        $colCajasAhorro = $this->getColeccionCajaAhorro();
        $i = 0;
        $encontrado = false;
        while ($i < count($colCuentasCorrientes) && !$encontrado) {
            if ($colCuentasCorrientes[$i]->getNumeroCuenta() == $numCuenta) {
                $encontrado = true;
                $cuenta = $colCuentasCorrientes[$i];
            }
            $i++;
        }
        if (!$encontrado) {
            $i = 0;
            while ($i < count($colCajasAhorro) && !$encontrado) {
                if ($colCajasAhorro[$i]->getNumeroCuenta() == $numCuenta) {
                    $encontrado = true;
                    $cuenta = $colCajasAhorro[$i];
                }
                $i++;
            }
        }
        if ($encontrado) {
            $cuenta->retirar($monto);
        }
    }





}