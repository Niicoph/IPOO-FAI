<?php 

include 'cuentaBancaria.php' ;

// PROGRAMA cuentaBancaria

$cuenta = new CuentaBancaria(12 , 45885458 , 123.131 , 70);
$cuenta->depositar(123);
echo $cuenta;