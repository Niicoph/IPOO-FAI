<?php 

/*

Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el
saldo actual y el interés anual que se aplica a la cuenta. Define en la clase los siguientes métodos:
14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.
14.b. Los método de acceso de cada uno de los atributos de la clase.
14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
dividido entre 365 aplicado al saldo actual).
14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
14.g. Crear un script Test_CuentaBancaria que cree un objeto CuentaBancaria e invoque a cada
uno de los métodos implementados.

*/

class CuentaBancaria {
    // Atributos
    private $numeroCuenta;
    private $dni; 
    private $saldoActual;
    private $interesAnual;
    //Constructor
    public function __construct($numeroC , $dni , $saldo , $interes) {
        $this->numeroCuenta = $numeroC;
        $this->dni = $dni;
        $this->saldoActual = $saldo;
        $this->interesAnual = $interes;
    }
    //getters y setters
    public function getNumeroCuenta() {
        return $this->numeroCuenta;
    }
    public function getDni() {
        return $this->dni;
    }
    public function getSaldoCuenta() {
        return $this->saldoActual;
    }
    public function getInteresAnual() {
        return $this->interesAnual;
    }
    public function setNumeroCuenta($value) {
        return $this->numeroCuenta = $value;
    }
    public function setDni($value) {
        return $this->dni = $value;
    }
    public function setSaldoCuenta($value) {
        return $this->saldoActual = $value;
    }
    public function setInteresAnual($value) {
        return $this->interesAnual = $value;
    }
    // métodos

    /**
     * actualiza el saldo en base al interes diario.
     * @return void
     */
    public function actualizarSaldo() {
        $interesDiario = $this->getInteresAnual() / 365;
        $saldoActual = $this->getSaldoCuenta();
        $nuevoSaldo = $saldoActual + ($interesDiario * $saldoActual) / 100;
        $this->setSaldoCuenta($nuevoSaldo);
    }
    /**
     * permite realizar un deposito determinado
     * @param float $cant
     * @return void
     */
    public function depositar($cant) {
        $saldoActual = $this->getSaldoCuenta();
        $this->setSaldoCuenta( $saldoActual + $cant );
    }
    /**
     * permite realizar un retiro en base a una cantidad
     * @param float $cant
     * @return void
     */
    public function retirar($cant) {
        $saldoActual = $this->getSaldoCuenta();
        if ($saldoActual == 0) {
            echo "No hay saldo disponible para retirar" .  "\n" ;
        } elseif ($cant > $saldoActual) { 
            echo "Usted no posee esa cantidad para retirar. Ingrese una cantidad correcta" . "\n" ;
        } else {
            $saldoRestante = $saldoActual - $cant;
            $this->setSaldoCuenta($saldoRestante);
            echo "Retiro exitoso: $" . $cant . ". Monto restante: $" . $saldoRestante . "\n";
        }
    }
    /**
     * Devuelve los valores de las variables intancia
     * @return string;
     */
    public function __toString() {
        return "Saldo disponible: $" . $this->getSaldoCuenta() . " Dni:" . $this->getDni() . " Numero de cuenta: "  . $this->getNumeroCuenta() . " Interes Anual: " . $this->getInteresAnual();
    }
}


