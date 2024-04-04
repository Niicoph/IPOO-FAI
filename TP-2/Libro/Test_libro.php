<?php 

include_once 'libro.php'; 
include_once '/Users/niicoph/Desktop/facu/IPOO-FAI/TP-2/Persona/persona.php';

// TEST PROGRAMA LIBRO


// $nombre, $apellido, $tipoDocumento , $numeroDocumento
$autor = new Persona("Robert" , "Greene" , "Dni" , 24229341);
// $titulo, $anio, $editorial , $isbn , $cantidadPaginas , $sinopsis , $persona
$libro = new Libro("48 laws of power" , 1998 , 'New York Times' , 192 , 495 , 'Self-help book'  , $autor);
echo $libro;