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
$responsableV = new ResponsableV(1, 123, "Juan", "Perez");
// Creamos el viaje
/* Datos del constructor: $codigoViaje , $destino , $cantidadMaximaPasajeros , $coleccionPasajeros , $responsableV*/
$viaje1 = new Viaje(1, "Cordoba", 5, $coleccionPasajeros1 , $responsableV);
$viaje2 = new Viaje(2, "Mendoza", 40, $coleccionPasajeros2, $responsableV);
$viaje3 = new Viaje(3, "Salta", 50, $coleccionPasajeros3 , $responsableV);
$coleccionViajes = [$viaje1, $viaje2, $viaje3];
// Creamos el menú para modificar o ver los datos del viaje

/**
 * Funcion que muestra el menu de opciones
 * return string
 */
function mostrarMenu() {
    echo "********* Menu de opciones *********\n";
    echo "1. Ver coleccion de viajes\n";
    echo "2. Agregar viaje a la coleccion\n";
    echo "3. Modificar la cantidad maxima de pasajeros de un viaje\n";
    echo "4. Ver datos de un pasajero \n";
    echo "5. Modificar los datos de un pasajero de un viaje\n";
    echo "6. Agregar pasajero a un viaje\n";
    echo "7. Eliminar pasajero de un viaje\n";
    echo "8. Ver datos de un viaje\n";
    echo "9. Salir\n";
    echo "************************************\n";
}
/**
 * Funcion que busca un viaje en la coleccion de viajes
 * @param int $codigo
 * @return Viaje
 */
function buscarViaje($codigo) {
    global $coleccionViajes;
    $i = 0;
    $encontrado = false;
    while ($i < count($coleccionViajes) && !$encontrado) {
        if ($coleccionViajes[$i]->getCodigoViaje() == $codigo) {
            $viaje = $coleccionViajes[$i];
            $encontrado = true;
        }
        $i++;
    }
    return $viaje;
}



do {
    mostrarMenu();
    echo "Ingrese una opcion: ";
    $opcion = trim(fgets(STDIN));
    $salir = false;
    switch ($opcion) {
        case 1:
            echo "Mostrando coleccion de Viajes -> \n";
            foreach ($coleccionViajes as $viaje) {
                echo $viaje . "\n";
                echo "--------------------------------\n";
            }
            break;
        case 2: 
            echo "Ingrese los datos del nuevo viaje -> \n";
            echo "Ingrese el codigo: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad maxima de pasajeros: ";
            $cantidadMaximaPasajeros = trim(fgets(STDIN));
            $viaje = new Viaje($codigo, $destino, $cantidadMaximaPasajeros, [], $responsableV);
            array_push($coleccionViajes, $viaje);
            echo "Viaje agregado correctamente\n";
            break;
        case 3:
            echo "Ingrese el codigo del viaje a modificar -> ";
            $codigo = trim(fgets(STDIN));
            if (buscarViaje($codigo)) {
                $viaje = buscarViaje($codigo);
                echo "Ingrese la nueva cantidad maxima de pasajeros: ";
                $cantidadMaximaPasajeros = trim(fgets(STDIN));
                $viaje->setCantidadMaximaPasajeros($cantidadMaximaPasajeros);
            } else {
                echo "No se encontro el viaje\n";
            }
            break;
        case 4:
            echo "Ingrese el codigo del viaje -> ";
            $codigo = trim(fgets(STDIN));
            $viaje = buscarViaje($codigo);
            if ($viaje) {
                echo "Ingrese el documento del pasajero a buscar -> ";
                $documento = trim(fgets(STDIN));
                $pasajero = $viaje->buscarPasajero($documento)["Pasajero"];
                if ($pasajero) {
                    echo $pasajero . "\n";
                } else {
                    echo "No se encontro el pasajero\n";
                }
            } else {
                echo "No se encontro el viaje\n";
            }
            break;
        case 5: 
            echo "Ingrese el codigo del viaje -> ";
            $codigo = trim(fgets(STDIN));
            $viaje = buscarViaje($codigo);
            if ($viaje) {
                echo "Ingrese el documento del pasajero a modificar ->"; 
                $documento = trim(fgets(STDIN));
                $pasajero = $viaje->buscarPasajero($documento)["Pasajero"];
                if ($pasajero) {
                    echo "Que dato desea modificar? \n";
                    echo "1) Nombre  2) Apellido  3) Documento  4) Telefono\n";
                    echo "Ingrese una opcion: ";
                    $opcion = trim(fgets(STDIN));
                    switch ($opcion) {
                        case 1:
                            echo "Ingrese el nuevo nombre: ";
                            $nombre = trim(fgets(STDIN));
                            $viaje->modificarNombrePasajero($nombre, $pasajero);
                            echo "Nombre modificado correctamente\n";
                            break;
                        case 2:
                            echo "Ingrese el nuevo apellido: ";
                            $apellido = trim(fgets(STDIN));
                            $viaje->modificarApellidoPasajero($apellido, $pasajero);
                            echo "Apellido modificado correctamente\n";
                            break;
                        case 3:
                            echo "Ingrese el nuevo documento: ";
                            $documento = trim(fgets(STDIN));
                            $viaje->modificarDocumentoPasajero($documento, $pasajero);
                            echo "Documento modificado correctamente\n";
                            break;
                        case 4:
                            echo "Ingrese el nuevo telefono: ";
                            $telefono = trim(fgets(STDIN));
                            $viaje->modificarTelefonoPasajero($telefono, $pasajero);
                            echo "Telefono modificado correctamente\n";
                            break;
                    }
                } else {
                    echo "No se encontro el pasajero en ese viaje\n";
                }
            }
            
            break;
        case 6:
            echo "Ingrese el codigo del viaje al que desea agregar un pasajero -> ";
            $codigo = trim(fgets(STDIN));
            $viaje = buscarViaje($codigo);
            if ($viaje) {
                echo "Ingrese el documento del pasajero a agregar ->";
                $documento = trim(fgets(STDIN));
                $pasajero = $viaje->buscarPasajero($documento)["Pasajero"];
                if (!$pasajero) {
                    $disponibilidad = $viaje->verificarDisponibilidad();
                    if ($disponibilidad) {
                        echo "Ingrese los datos del pasajero -> \n";
                        echo "Ingrese el nombre: ";
                        $nombre = trim(fgets(STDIN));
                        echo "Ingrese el apellido: ";
                        $apellido = trim(fgets(STDIN));
                        echo "Ingrese el documento: ";
                        $documento = trim(fgets(STDIN));
                        echo "Ingrese el telefono: ";
                        $telefono = trim(fgets(STDIN));
                        $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
                        $viaje->agregarPasajero($pasajero);
                        echo "Pasajero agregado correctamente\n";
                    } else {
                        echo "No hay disponibilidad para agregar pasajeros\n";
                    }
                } else {
                    echo "El pasajero ya se encuentra en el viaje\n";
                }
            } else {
                echo "No se encontro el viaje\n";
            }
            break;
        case 7:
            echo "Ingrese el codigo del viaje al que desea eliminar un pasajero -> ";
            $codigo = trim(fgets(STDIN));
            $viaje = buscarViaje($codigo);
            if ($viaje) {
                echo "Ingrese el documento del pasajero a eliminar -> ";
                $documento = trim(fgets(STDIN));
                $string = $viaje->eliminarPasajero($documento);
                echo $string . "\n";
            } else {
                echo "No se encontro el viaje\n";
            }
            break;
        case 8:
            echo "Ingrese el codigo del viaje a ver -> ";
            $codigo = trim(fgets(STDIN));
            $viaje = buscarViaje($codigo);
            if ($viaje) {
                echo $viaje . "\n";
            } else {
                echo "No se encontro el viaje\n";
            }
            break;
        case 9:
            $salir = true;
            break;
    }
} while (!$salir);
