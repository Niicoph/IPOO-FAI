<?php 

include_once 'Viaje.php';


// TEST viaje


$pasajero1 = new Pasajero("Juan", 1, 1);
$pasajero2 = new Pasajero("Pedro", 2, 2);
$pasajero3 = new Pasajero("Maria", 3, 3);
$pasajero4 = new PasajeroVIP("Jose", 4, 4, 123, 200);
$pasajero5 = new PasajeroVIP("Ana", 5, 5, 456, 200);
$pasajero6 = new PasajeroVIP("Lucia", 6, 6, 789, 100);
$pasajero7 = new PasajeroNecesidad("Carlos", 7, 7, true, true, true);
$pasajero8 = new PasajeroNecesidad("Luis", 8, 8, false, true, false);
$pasajero9 = new PasajeroNecesidad("Fernando", 9, 9, true, false, false);




// ($codigoViaje , $destino , $cantidadMaximaPasajeros , [] , $responsableViaje , $costoViaje)
$viaje1 = new Viaje(111, "Cordoba" , 5 , [] , "Juan", 1000);


$vender1 = $viaje1->venderPasaje($pasajero1); // devuelve un importe 
$vender2 = $viaje1->venderPasaje($pasajero2); // devuelve un importe 
$vender3 = $viaje1->venderPasaje($pasajero3); // devuelve un importe 
$vender4 = $viaje1->venderPasaje($pasajero4); // devuelve un importe 
$vender5 = $viaje1->venderPasaje($pasajero5); // devuelve un importe 
$vender6 = $viaje1->venderPasaje($pasajero6); // devuelve un importe 

if ($vender6 != 0) {
    echo "Se vendio el pasaje\n";
} else {
    echo "No se vendio el pasaje\n";
}

$cantidadMaxima = $viaje1->getCantidadMaximaPasajeros();
echo "Cantidad de pasajeros Maxima: $cantidadMaxima\n";
