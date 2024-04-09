<?php 


// Test Punto_6

include_once 'tramite.php';
include_once 'mostrador.php';
include_once 'cliente.php';
include_once 'banco.php';

// $tituloTramite, $tipoTramite

$tramite1 = new Tramite('Pagar Luz' , 'factura');
$tramite2 = new Tramite('Pagar agua' , 'factura');
$tramite3 = new Tramite('Retirar dinero' , 'retiro');
$tramite4 = new Tramite('Depositar dinero' , 'deposito');

// $tipoTramite , $limiteCola , $clientesEnCola
$mostrador1 = new Mostrador('pagar x' , 15 , 14);
$mostrador2 = new Mostrador('retirar' , 15 , 5);
$mostrador3 = new Mostrador('retirar' , 15 , 6);
$mostrador4 = new Mostrador('pagar y' , 10 , 15);
$coleccionMostradores = [$mostrador1, $mostrador2, $mostrador3, $mostrador4];
// testing mostrador y tramite
/*
$atiende = $mostrador1->atiende($tramite3->getTipoTramite());
if ($atiende) {
    echo "El mostrador atiende el tipo de tramite: " ;
} else {
    echo "El mostrador no atiende el tipo de tramite " ;
}
*/
// testing banco y cliente
// $nombre, $apellido , $objTramite
$cliente1 = new Cliente('Nico' , 'Pesce' , $tramite1);
$cliente2 = new Cliente('Juan' , 'Rodriguez' , $tramite2);
$cliente3 = new Cliente('Matias' , 'Perez' , $tramite3);
// $coleccionMostradores , $objCliente

$banco = new Banco($coleccionMostradores , $cliente1);
$asd = $banco->mejorMostradorPara('retirar');

if ($asd == null) {
    echo "filas llenas";
} else {
    print_r($asd);
}