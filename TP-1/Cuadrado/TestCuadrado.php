<?php


// TEST PROGRAMA CUADRADO

include 'Cuadrado.php';

$a = ["x" => 1 , "y" => 5];
$b = ["x" => 5 , "y" => 5];
$c = ["x" => 1 , "y" => 1];
$d = ["x" => 5 , "y" => 1];
$cuadrado = new Cuadrado($a, $b, $c, $d);
		
echo $cuadrado;
echo "\n";
echo "el area del cuadrado es: ". $cuadrado -> area();
echo "\n";
$cuadrado -> desplazar(["x" => 2, "y" => 2]);
echo "\n";
echo "el area del cuadrado es: ".$cuadrado -> area();
echo "\n";
echo $cuadrado -> aumentarTamanio(5);
echo "\n";
echo "el area del cuadrado es: ".$cuadrado -> area();		
echo "\n";
echo $cuadrado;
