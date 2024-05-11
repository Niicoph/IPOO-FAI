<?php


include_once 'Cliente.php';
include_once 'Local.php';
include_once 'Venta.php';
include_once 'Rubro.php';



$rubroConservas = new Rubro("Conservas" , 35);
$rubroRegalos = new Rubro("Regalos" , 55);

// ($codigoBarra, $descripcion , $stock , $precioCompra , $porcentajeIVA , $objRubro , $tipoProducto)

$producto1 = new Producto(1234, "Remera" , 10 , 1000 , 21 , $rubroRegalos , "importado");
$producto2 = new Producto(1235, "Atun" , 15 , 1200 , 21 , $rubroConservas , "regional");
$producto3 = new Producto(1236, "Zapatillas" , 7 , 1300 , 21 , $rubroRegalos , "importado");
$producto4 = new Producto(1237, "Crema" , 9 , 1500 , 21 , $rubroConservas , "regional");

$local = new Local([],[],[]);

$agregar1 = $local->incorporarProductoLocal($producto1);
$agregar2 = $local->incorporarProductoLocal($producto2);
$agregar3 = $local->incorporarProductoLocal($producto3);
$agregar4 = $local->incorporarProductoLocal($producto4);

$agregar5 = $local->incorporarProductoLocal($producto4);

if (!$agregar5) {
    echo "****  Producto agregado correctamente **** \n ";
} else {
    echo "****  No se puedo agregar correctamente el producto **** \n ";
}

$valorProducto1 = $local->retornarImporteProducto(1234);

echo "Producto 1: " .  $valorProducto1 . "\n";


