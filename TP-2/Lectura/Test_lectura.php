<?php 


include_once 'lectura.php';
include_once '/Users/niicoph/Desktop/facu/IPOO-FAI/TP-2/Persona/persona.php';
include_once '/Users/niicoph/Desktop/facu/IPOO-FAI/TP-2/Libro/libro.php';


// TEST PROGRAMA LECTURA



// $nombre, $apellido, $tipoDocumento , $numeroDocumento
$autor = new Persona("Robert" , "Greene" , "Dni" , 32883748);
// $titulo, $anio, $editorial , $isbn , $cantidadPaginas , $sinopsis , $persona
$libro = new Libro("48 leyes del poder" , 1998 , "Profile Books" , 978184765 , 463 , "sinopsis del libro..." , $autor);
// $libro , $paginaActual
$lectura = new Lectura($libro , 13);

$paginaActual = $lectura->getPaginaActual();
$paginaFinal = $libro->getCantidadPaginas();

for ($i = $paginaActual ; $paginaActual < $paginaFinal ; $paginaActual++ ) {
    $lectura->siguientePagina();
    echo $lectura->getPaginaActual();
    echo "\n";
}   



