<?php 

include 'Libro.php';

$libro1 = new Libro("El principito", 1943, "Emecé", "978-987-566-016-5", "Antoine", "de Saint-Exupéry");
$libro2 = new Libro("El amor en los tiempos del cólera", 1985, "Sudamericana", "978-950-07-0628-2", "Gabriel", "García Márquez");
$libro3 = new Libro("Cien años de soledad", 1967, "Sudamericana", "978-950-07-9642-2", "Gabriel", "García Márquez");



$libro1->libroEditoriales([$libro1, $libro2, $libro3], "Sudamericana");
