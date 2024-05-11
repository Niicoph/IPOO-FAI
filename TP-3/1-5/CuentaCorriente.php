<?php 


include 'Cuenta.php';

class CuentaCorriente extends Cuenta { 
    // atributos
    private $montoMaximoDescubierto;
    // constructor
    public function __construct($objCliente , $saldo ,  $montoMaximoDescubierto) {
        Parent::__construct($objCliente , $saldo);
        $this->montoMaximoDescubierto = $montoMaximoDescubierto;
    }
    // getters y setters
    public function getMontoMaximoDescubierto() {
        return $this->montoMaximoDescubierto;
    }
    public function setMontoMaximoDescubierto($monto) {
        $this->montoMaximoDescubierto = $monto;
    }
    // métodos
    public function realizarRetiro($monto) {
        $saldo = $this->getSaldo();
        $descubierto = $this->getMontoMaximoDescubierto();  // recuperamos tanto el saldo como el descubierto

        if ($monto <= ($saldo + $descubierto)) {  // 200   <= 130 + 100 -> me prestan 70
            $saldoRestante = $saldo - $monto;     //   130 - 200 = -70 -> deuda
            $this->setSaldo($saldoRestante);      // saldo = -70
        } else {
            $saldoRestante = "Saldo insuficiente";
        }
        return $saldoRestante;

    }
    
}