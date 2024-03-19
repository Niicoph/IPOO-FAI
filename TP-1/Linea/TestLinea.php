<?php 

include 'linea.php';

// TEST PROGRAMA LINEA

                // x y x y
$linea = new Linea(3,1,7,1);
$linea->mueveDerecha(4);  // deberia mover los valores de x en 4 cada uno
echo $linea;