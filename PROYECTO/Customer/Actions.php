<?php

include_once './Customer.php';


if (isset($_POST['customerId']) && isset($_POST['customerName'])) {
    $C_ID = $_POST['customerId'];
    $C_NAME = $_POST['customerName'];
    $C_EMAIL = $_POST['customerEmail'];
    $C_TYPE = $_POST['customerType'];
    $C_DETAILS = $_POST['customerDetails'];
    $C_DIRECTION = $_POST['customerDirection'];
    if (isset($_POST['metodo']) && $_POST['metodo'] == 'agregar') {
        echo Customer::insertCustomer($C_ID,$C_NAME,$C_EMAIL,$C_TYPE,$C_DIRECTION,$C_DETAILS);
        
    }else
        if (isset($_POST['metodo']) && $_POST['metodo'] == 'editar') {
            $RES=json_decode(Customer::updateCustomer($C_ID,$C_NAME,$C_EMAIL,$C_TYPE,$C_DIRECTION,$C_DETAILS));
            
        }
}
if (isset($_GET['customerId']) && isset($_GET['metodo'])) {
    if($_GET['metodo']=='delete'){
        Customer::deleteCustomer($_GET['customerId']);
    }
    
}