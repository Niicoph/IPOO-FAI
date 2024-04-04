<?php 

include_once '/Users/niicoph/Desktop/facu/IPOO-FAI/TP-2/Libro/libro.php';
include_once '/Users/niicoph/Desktop/facu/IPOO-FAI/TP-2/punto5/lectura.php';
include_once '/Users/niicoph/Desktop/facu/IPOO-FAI/TP-2/Persona/persona.php';
include_once '/Users/niicoph/Desktop/facu/IPOO-FAI/TP-2/Libro/libro.php';


// TEST PROGRAMA LECTURA PUNTO

$autor = new Persona("Robert" , "Greene" , "Dni" , 32883748);

$libro = new Libro("48 leyes del poder" , 1998 , "Profile Books" , 978184765 , 463 , "sinopsis del libro...1" , $autor);
$libro2 = new Libro("librito 2" , 1998 , "Profile Books" , 978184765 , 463 , "sinopsis del libro...2" , $autor);
$libro3 = new Libro("librito 3" , 1998 , "Profile Books" , 978184765 , 463 , "sinopsis del libro...3" , $autor);
$libro4 = new Libro("librito 4" , 1998 , "Profile Books" , 978184765 , 463 , "sinopsis del libro...4" , $autor);
$librosLeidos = [$libro , $libro2 , $libro3];

// $libro , $paginaActual, $librosLeidos
$lectura = new Lectura($libro4 , 13 , $librosLeidos);

$asd = $lectura->libroLeido("librito 3");
if ($asd) {
    echo "libro leido";
} else {
    echo "libro no leido";
}