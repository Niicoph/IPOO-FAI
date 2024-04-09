<?php 


// Test Punto_7

include_once 'tramite.php';
include_once 'mostrador.php';
include_once 'cliente.php';
include_once 'banco.php';



$tramite1 = new Tramite('Pagar Luz' , 'factura' , 199);
$tramite2 = new Tramite('Pagar agua' , 'factura' , 201);
$tramite3 = new Tramite('Retirar dinero' , 'retiro' , 111);
$tramite4 = new Tramite('Depositar dinero' , 'deposito' , 395);


$mostrador1 = new Mostrador('factura' , 15 , 14);
$mostrador2 = new Mostrador('factura' , 15 , 4);
$mostrador3 = new Mostrador('deposito' , 15 , 2);
$mostrador4 = new Mostrador('factura' , 10 , 12);
$coleccionMostradores = [$mostrador1, $mostrador2, $mostrador3, $mostrador4];

$cliente1 = new Cliente('Nico' , 'Pesce' , $tramite1);
$cliente2 = new Cliente('Juan' , 'Rodriguez' , $tramite2);
$cliente3 = new Cliente('Matias' , 'Perez' , $tramite3);


$banco = new Banco($coleccionMostradores , $cliente1);

$banco->ingresarTramite($cliente1->getObjTramite());
$tramitesAbiertos = $banco->getTramitesAbiertos();
$banco->cerrarTramite($cliente1->getObjTramite());
print_r($tramitesAbiertos);
