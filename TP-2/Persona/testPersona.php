<?php 

include 'persona.php';
include 'cuentaBancaria.php';

// TEST PROGRAMA PERSONA -- delegación

$persona = new Persona('Nico' , 'pesce' , 'dni' , 20933219);

$cuentaBancaria = new CuentaBancaria(23  , 24000 , 6.4 , $persona);

echo $cuentaBancaria;