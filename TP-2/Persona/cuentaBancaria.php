<?php 

class CuentaBancaria {
    // Atributos
    private $numeroCuenta;
    private $saldoActual;
    private $interesAnual;
    private $objPersona;
    //Constructor
    public function __construct($numeroC , $saldo , $interes , $persona) {
        $this->numeroCuenta = $numeroC;
        $this->saldoActual = $saldo;
        $this->interesAnual = $interes;
        $this->objPersona = $persona;
    }
    //getters y setters
    public function getNumeroCuenta() {
        return $this->numeroCuenta;
    }
    public function  getObjPersona() {
        return $this->objPersona;
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
    public function setObjPersona($persona) {
        $this->objPersona = $persona;
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
     * @return string $retorno
     */
    public function retirar($cant) {
        $saldoActual = $this->getSaldoCuenta();
        if ($saldoActual == 0) {
            $retorno = "No hay saldo disponible para retirar";
        } elseif ($cant > $saldoActual) { 
            $retorno = "Usted no posee esa cantidad para retirar. Ingrese una cantidad correcta";
        } else {
            $saldoRestante = $saldoActual - $cant;
            $this->setSaldoCuenta($saldoRestante);
            $retorno = "Retiro exitoso: $" . $cant . ". Monto restante: $" . $saldoRestante ;
        }
        return $retorno;
    }
    /**
     * Devuelve los valores de las variables intancia
     * @return string;
     */
    public function __toString() {
       return "numero de cuenta: " . $this->getNumeroCuenta() .
       "\n" . "persona: " . $this->getObjPersona() . 
       "\n" . "saldo actual: " . $this->getSaldoCuenta() . 
       "\n" . "interes: " . $this->getInteresAnual();
    }
}


