<?php 

/*

Implementar un script TestEmpresa en la cual:
1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
descripción, porcentaje incremento anual, activo.
4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.
9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
10. Realizar un echo de la variable Empresa creada en 2.
*/

include "Cliente.php";
include "Moto.php";
include "Venta.php";
include "Empresa.php";
// 1 y 2
$objCliente1 = new Cliente("Juan", "Perez", "activo", "DNI", 12345678);
$objCliente2 = new Cliente("Maria", "Gomez", "activo", "DNI", 87654321);
$objMoto1 = new Moto(11 , 2230000 , 2022 , "Benelli Imperiale 400" , 85 , true);  
$objMoto2 = new Moto(12 , 584000 , 2021 , "Zanella Zr 150 Ohc " , 70 , true);   
$objMoto3 = new Moto(13 , 999900 , 2023 , "Zanella Patagonian Eagle 250 " , 55 , false); 

/*
// 4
Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
*/

$empresa = new Empresa("Alta Gama", "Av Argetina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);
// 5
/*
5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
*/
$respuesta = $empresa->registrarVenta([11,12,13], $objCliente2);
/*

// 6
/* 
6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
*/
$respuesta2 = $empresa->registrarVenta([0], $objCliente2);

// 7
/*
7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
*/
$respuesta3 = $empresa->registrarVenta([2], $objCliente2);

// 8 
/* 
8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.
*/
$respuesta4 = $empresa->retornarVentasXCliente("DNI", 12345678);
// 9
/*
9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
*/

$respuesta5 = $empresa->retornarVentasXCliente("DNI", 87654321);
// 10
/* 
10. Realizar un echo de la variable Empresa creada en 2.
*/
echo $empresa;

