<?php 


include 'Cuenta.php';
class CajaAhorro extends Cuenta {
    public function __construct($objCliente, $saldo) {
        Parent::__construct($objCliente, $saldo);
    }
    // toString 
}