<?php 

// Test Programa Viaje 
include_once "Viaje.php";
include_once "Pasajero.php";
include_once "ResponsableV.php";

// Creamos los pasajeros y los agregamos a una coleccion
/* Datos del constructor: $nombre, $apellido, $documento , $telefono */
$pasajero1 = new Pasajero("Juan", "Perez", 12345678, "+549112345678");
$pasajero2 = new Pasajero("Maria", "Gomez", 87654321 , "+5493336789");
$pasajero3 = new Pasajero("Carlos", "Lopez", 11223344 , "+5411312383");
$pasajero4 = new Pasajero("Ana", "Martinez", 44332211 , "+5491332789");
$coleccionPasajeros1 = [$pasajero1, $pasajero2, $pasajero3, $pasajero4];
$coleccionPasajeros2 = [$pasajero1, $pasajero2, $pasajero3];
$coleccionPasajeros3 = [$pasajero1, $pasajero2];
// Creamos los responsables del viaje y los agregamos a una coleccion
/* Datos del constructor: $numeroEmpleado , $numeroLicencia , $nombre , $apellido */
$responsable1 = new ResponsableV(1, 123, "Juan", "Perez");
$responsable2 = new ResponsableV(2, 456, "Maria", "Gomez");
$responsable3 = new ResponsableV(3, 789, "Carlos", "Lopez");
$responsable4 = new ResponsableV(4,3223, "Laura" , "Gomez");
$coleccionResponsables = [$responsable1, $responsable2, $responsable3, $responsable4];
// Creamos el viaje
/* Datos del constructor: $codigoViaje , $destino , $cantidadMaximaPasajeros , $coleccionPasajeros , $responsableV*/
$viaje1 = new Viaje(1, "Cordoba", 5, $coleccionPasajeros1 , $responsable1);
$viaje2 = new Viaje(2, "Mendoza", 40, $coleccionPasajeros2, $responsable2);
$viaje3 = new Viaje(3, "Salta", 50, $coleccionPasajeros3 , $responsable3);
$coleccionViajes = [$viaje1, $viaje2, $viaje3];
// Creamos el menú para modificar o ver los datos del viaje

do {
    echo "********* Menu de opciones *********\n";
    echo "1. Ver coleccion de viajes\n";
    echo "2. Agregar viaje a la coleccion\n";
    echo "3. Modificar la cantidad maxima de pasajeros de un viaje\n";
    echo "4. Ver datos de un pasajero \n";
    echo "5. Modificar los datos de un pasajero de un viaje\n";
    echo "6. Agregar pasajero a un viaje\n";
    echo "7. Ver datos de un viaje\n";
    echo "8. Salir\n";
    echo "************************************\n";
    echo "Ingrese una opcion: ";
    $opcion = trim(fgets(STDIN));
    $salir = false;
    switch ($opcion) {
        case 1: 
            foreach($coleccionViajes as $viaje) {
                $cantidadPasajeros = count($viaje->getColeccionPasajeros());
                echo "Codigo de viaje: " . $viaje->getCodigoViaje() . "\n";
                echo "Destino: " . $viaje->getDestinoViaje() . "\n";
                echo "Cantidad maxima de pasajeros: " . $viaje->getCantidadMaximaPasajeros() . "\n";
                echo "Cantidad Pasajeros: " . $cantidadPasajeros . "\n";
                echo "Responsable del viaje => " . "\n" . $viaje->getResponsableViaje();
                echo "----------**********----------\n";
            }
            break;
        case 2: 
            echo "Ingrese el codigo del viaje:";
            $codigo = trim(fgets(STDIN));
            $i = 0;
            $encontrado = false;
            while ($i < count($coleccionViajes) && !$encontrado) {
                if ($coleccionViajes[$i]->getCodigoViaje() == $codigo) {
                    echo "El codigo de viaje ya existe\n";
                    $encontrado = true;
                }
                $i++;
            }
            if (!$encontrado) {
                echo "Ingrese el destino del viaje: ";
                $destino = trim(fgets(STDIN)) . "\n";
                echo "Ingrese la cantidad maxima de pasajeros: ";
                $cantidadMaxima = (int)trim(fgets(STDIN)) . "\n";
                echo "Ingrese el numero de empleado del responsable: ";
                $numeroEmpleado = (int)trim(fgets(STDIN)) . "\n";
                $encontrado2 = false;
                $i = 0;
                while ($i < count($coleccionResponsables) && !$encontrado2) {
                    if ($coleccionResponsables[$i]->getNumeroEmpleado() == $numeroEmpleado) {
                        $viaje = new Viaje($codigo, $destino, $cantidadMaxima, [], $coleccionResponsables[$i]);
                        $encontrado2 = true;
                    }
                    $i++;
                }
                if (!$encontrado2) {
                    echo "No se encontro el responsable con el numero de empleado ingresado\n";
                }
    
            }
            break;
        case 3:
            echo "Ingrese el codigo del viaje: ";
            $codigo = trim(fgets(STDIN)) . "\n";
            $encontrado = false;
            $i = 0;
            while ($i < count($coleccionViajes) && !$encontrado) {
                if ($coleccionViajes[$i]->getCodigoViaje() == $codigo) {
                    echo "Ingrese la nueva cantidad maxima de pasajeros: ";
                    $cantidadMaxima = (int)trim(fgets(STDIN)) . "\n";
                    $coleccionViajes[$i]->setCantidadMaximaPasajeros($cantidadMaxima);
                    echo "Cantidad maxima de pasajeros modificada\n";
                    $encontrado = true;
                }
                $i++;
            }
            if (!$encontrado) {
                echo "No se encontro el viaje con el codigo ingresado\n";
            }
            break;
            
        case 4:
            echo "Ingrese el codigo de viaje:";
            $codigo = trim(fgets(STDIN));
            $encontrado = false;
            $i = 0;
            while ($i < count($coleccionViajes) && !$encontrado) {
                if ($coleccionViajes[$i]->getCodigoViaje() == $codigo) {
                    echo "Ingrese el documento del pasajero: ";
                    $documento = trim(fgets(STDIN));
                    $pasajerosDelViaje = $coleccionViajes[$i]->getColeccionPasajeros(); 
                    $encontrado2 = false;
                    $j = 0;
                    while ($j < count($pasajerosDelViaje) && !$encontrado2) {
                        if ($pasajerosDelViaje[$j]->getDocumento() == $documento) {
                            echo "Nombre: " . $pasajerosDelViaje[$j]->getNombre() . "\n";
                            echo "Apellido: " . $pasajerosDelViaje[$j]->getApellido() . "\n";
                            echo "Documento: " . $pasajerosDelViaje[$j]->getDocumento() . "\n";
                            echo "Telefono: " . $pasajerosDelViaje[$j]->getTelefono() . "\n";
                            echo "Pertenece al viaje: " . $codigo . "\n";
                            $encontrado2 = true;
                        }
                        $j++;
                    }
                    if (!$encontrado2) {
                        echo "No se encontro el pasajero con el documento ingresado\n";
                    }
                    $encontrado = true;
                }
                $i++;
            }
            if (!$encontrado) {
                echo "No se encontro el viaje con el codigo ingresado\n";
            }
            break;

        case 5:
            echo "Ingrese el codigo del viaje: ";
            $codigo = trim(fgets(STDIN)) . "\n";
            $encontrado = false;
            $i = 0;
            while ($i < count($coleccionViajes) && !$encontrado) {
                if ($coleccionViajes[$i]->getCodigoViaje() == $codigo) {
                    echo "Ingrese el documento del pasajero: ";
                    $documento = trim(fgets(STDIN)) . "\n";
                    $encontrado2 = false;
                    $j = 0;
                    while ($j < count($coleccionViajes[$i]->getColeccionPasajeros()) && !$encontrado2) {
                        if ($coleccionViajes[$i]->getColeccionPasajeros()[$j]->getDocumento() == $documento) {
                            echo "Ingrese el nuevo nombre del pasajero: ";
                            $nombre = trim(fgets(STDIN)) . "\n";
                            echo "Ingrese el nuevo apellido del pasajero: ";
                            $apellido = trim(fgets(STDIN)) . "\n";
                            echo "Ingrese el nuevo telefono del pasajero: ";
                            $telefono = trim(fgets(STDIN)) . "\n";
                            $coleccionViajes[$i]->getColeccionPasajeros()[$j]->setTelefono($telefono);
                            $coleccionViajes[$i]->getColeccionPasajeros()[$j]->setNombre($nombre);
                            $coleccionViajes[$i]->getColeccionPasajeros()[$j]->setApellido($apellido);
                            echo "Datos del pasajero modificados\n";
                            $encontrado2 = true;
                        }
                        $j++;
                    }
                    if (!$encontrado2) {
                        echo "No se encontro el pasajero con el documento ingresado\n";
                    }
                    $encontrado = true;
                }
                $i++;
            }
            if (!$encontrado) {
                echo "No se encontro el viaje con el codigo ingresado\n";
            }
            break;

        case 6:
            echo "Ingrese el codigo del viaje: ";
            $codigo = trim(fgets(STDIN)) . "\n";
            $encontrado = false;
            $i = 0;
            while ($i < count($coleccionViajes) && !$encontrado) {
                if ($coleccionViajes[$i]->getCodigoViaje() == $codigo) {
                    $pasajerosDelViaje = $coleccionViajes[$i]->getColeccionPasajeros(); 
                    $cantidadPasajeros = count($pasajerosDelViaje);
                    echo "Ingrese el documento del pasajero (para verificar que no exista): ";
                    $documento = trim(fgets(STDIN)) . "\n";
                    $encontrado2 = false;
                    $j = 0;
                    while ($j < count($pasajerosDelViaje) && !$encontrado2) {
                        if ($pasajerosDelViaje[$j]->getDocumento() == $documento) {
                            echo "El pasajero ya se encuentra en el viaje\n";
                            $encontrado2 = true;
                        }
                        $j++;
                    }
                    if (!$encontrado2 && $cantidadPasajeros <= $coleccionViajes[$i]->getCantidadMaximaPasajeros() ){
                        echo "Ingrese el nombre del pasajero: ";
                        $nombre = trim(fgets(STDIN)) . "\n";
                        echo "Ingrese el apellido del pasajero: ";
                        $apellido = trim(fgets(STDIN)) . "\n";
                        echo "Ingrese el telefono del pasajero: ";
                        $telefono = trim(fgets(STDIN)) . "\n";
                        $pasajero = new Pasajero($nombre, $apellido, $documento , $telefono);
                        array_push($pasajerosDelViaje, $pasajero);
                        $coleccionViajes[$i]->setColeccionPasajeros($pasajerosDelViaje);
                        echo "Pasajero agregado al viaje\n";
                    } else {
                        echo "No se puede agregar mas pasajeros al viaje\n";
                    }
                    $encontrado = true;
                }
                $i++;
            }
            if (!$encontrado) {
                echo "No se encontro el viaje con el codigo ingresado\n";
            }
            break;
        case 7: 
            echo "Ingrese el codigo del viaje: ";
            $codigo = trim(fgets(STDIN)) . "\n";
            $encontrado = false;
            $i = 0;
            while ($i < count($coleccionViajes) && !$encontrado) {
                if ($coleccionViajes[$i]->getCodigoViaje() == $codigo) {
                    $objViaje = $coleccionViajes[$i];
                    echo $objViaje;
                    $encontrado = true;
                } else {
                    echo "No se encontro el viaje con el codigo ingresado\n";
                }
                $i++;
            }
            break;
        case 8:
            $salir = true;
            break;
    }

} while (!$salir);
