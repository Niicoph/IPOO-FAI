<?php 


include 'Banco.php';
include 'Cliente.php';
include 'CuentaCorriente.php';
include 'CajaAhorro.php';
include 'Persona.php';
include 'Cuenta.php';


// Crear un objeto de la clase Banco
  // ($colCuentaCorriente, $colCajaAhorro, $ultimoValorCuenta ,  $colClientes)
$banco = new Banco([] , [] , 0 , []);

// Crear dos  nuevos clientes Cliente1 y Cliente2 y agregarlos al banco
    // ($nombre, $apellido , $dni , $numCliente)
$cliente1 = new Cliente('Juan' , 'Perez' , 12345678 , 1);
$cliente2 = new Cliente('Maria' , 'Gomez' , 87654321 , 2);

$banco->incorporarCliente($cliente1);
$banco->incorporarCliente($cliente2);

// Crear dos Cuentas Corrientes, una asociada al cliente A y otra al cliente B, y agregarlas al Banco .

$banco->incorporarCuentaCorriente(1 , 1000);
$banco->incorporarCuentaCorriente(2 , 2000);

// Crear tres Cajas de Ahorro, dos asociadas al cliente A y una asociada al cliente B, y agregarlas al Banco 
    // ($objCliente, $saldo)
$banco->incorporarCajaAhorro(1);
$banco->incorporarCajaAhorro(1);
$banco->incorporarCajaAhorro(2);

//Depositar $300 en cada una de las Cajas de Ahorro
$banco->realizarDeposito(1, 1000);

