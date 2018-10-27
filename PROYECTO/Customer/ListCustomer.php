<?php

$clientes = Customer::getCustomers();
if (count($clientes) > 0) {
    // var_dump($clientes);
    foreach ($clientes as $value) {
        echo $value['CUSTOMER_NAME'] . "<br>";
        echo $value['CUSTOMER_EMAIL'] . "<br>";
        echo $value['CUSTOMER_ADDRESS'] . "<br>";
        echo $value['OTHER_DETAILS'] . "<br>";
        echo $value['CUSTOMER_NAME'] . "<br>";
    }
} else {
    echo 'there are no customers';
}
