<?php 

include 'login.php';

// TEST PROGRAMA LOGIN

$login = new Login ("nico" , "pass1" , "tu contra empieza por p");
$login->changePassword("pass2");
$login->changePassword("pass3");
$login->changePassword("pass4");
$login->changePassword("pass5");
$login->changePassword("pass6");
$login->changePassword("pass7");
$login->changePassword("pass8");
$login->changePassword("pass9");

