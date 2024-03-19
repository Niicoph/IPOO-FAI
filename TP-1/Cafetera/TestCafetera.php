<?php 

include "cafetera.php";


// TEST PROGRAMA CAFETERA

$cafetera = new Cafetera(70 , 50);
echo $cafetera;
$cafetera->agregarCafe(20);
echo $cafetera;

// CASO 1 = cantidad > cantidad Maxima  / 200 > 70 ✅ 
// CASO 2 = cantidad + cantidadActual > cantidad Maxima  = 50 + 50 = 100 > 70 ✅
// CASI 3 = cantidad + cantidadActual < cantidad Maxima = 10 + 50 = 60  < 70 ✅