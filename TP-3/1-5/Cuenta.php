<?php 


class Cuenta {
    // atributos 
    private $objCliente;
    private $saldo;
    // constructor
    public function __construct($objCliente , $saldo) {
        $this->objCliente = $objCliente;
        $this->saldo = $saldo;
    }  
    // getters y setters
    public function getObjCliente() {
        return $this->objCliente;
    }
    public function setObjCliente($objCliente) {
        $this->objCliente = $objCliente;
    }
    public function getSaldo() {
        return $this->saldo;
    }
    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }
    // métodos 
    public function saldoCuenta() {
        return $this->getSaldo();
    }
    public function realizarDeposito($monto){
        $this->setSaldo($monto);
    }
    public function realizarRetiro($monto) {
        $saldo = $this->getSaldo();
        if ($monto < $saldo)  { 
            $saldoRestante = $saldo - $monto;
            $this->setSaldo($saldoRestante);
        } else {
            $saldoRestante = "Saldo insuficiente";
        }
        return $saldoRestante;
    }

    // toString
    public function __toString() {
        return "Cliente: " . $this->getObjCliente() . "\n". 
         " Saldo: " . $this->getSaldo();
    }
}