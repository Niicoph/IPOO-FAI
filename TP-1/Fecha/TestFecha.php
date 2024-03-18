<?php
include 'Fecha.php';

$p = new fecha(05, 07, 2020);

if ($p->anioBisiesto()) {
    echo "Es anio bisiesto" . "\n";
} else {
    echo "No es anio bisiesto" . "\n";
}
echo "Fecha Abreviada: " . $p->fechaAbreviada() . " Fecha Extendida: " . $p->fechaExtendida();

