<?php

include_once('Conexion.php');
include_once("Customer/Customer.php");
$clientes = Customer::getCustomers();
if (count($clientes) > 0) {
    var_dump($clientes);
   // foreach ($value as $clientes) {
        echo $clientes[0]['CUSTOMER_NAME']. "<br>";
    //}
} else {
    echo 'there are no customers';
}
