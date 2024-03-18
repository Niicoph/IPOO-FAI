<?php

include 'reloj.php';

// TEST PROGRAMA RELOJ

$reloj = new Reloj(14 , 59 , 59);
$reloj->incremento();
echo $reloj;