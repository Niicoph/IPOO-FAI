<?php 

include 'Teatro.php' ; 

// TEST PROGRAMA TEATRO

$teatro = new Teatro("Cinema" , "Avenida San juan" , "Lo que el agua se llevo" , 12.14);
echo $teatro;
$teatro->cambiarNombreFuncion("susurros");
echo $teatro;
