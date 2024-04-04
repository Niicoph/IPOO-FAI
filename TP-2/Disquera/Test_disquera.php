<?php 


include_once 'disquera.php';
include_once '/Users/niicoph/Desktop/facu/IPOO-FAI/TP-2/Persona/persona.php';

// $nombre, $apellido, $tipoDocumento , $numeroDocumento
$persona = new Persona('Nico' , 'Pesce' , 40993428 , 'Dni');
// $persona , $horaInicio , $horaHasta , $estado , $direccion
$disquera = new Disquera($persona, 17.5 , 21.5 , 'Cerrado' , 'Canale 1884');

$condicion = $disquera->dentroHorarioAtencion(17 , 29);
if ($condicion == true) {
    echo "La tienda se encuentra Abierta";
} else {
    echo "La tienda se encuentra Cerrada";
}

