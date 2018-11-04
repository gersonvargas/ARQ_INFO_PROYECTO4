<?php

include_once './Address.php';
echo $_POST['metodo'];
if (isset($_POST['metodo']) && $_POST['metodo'] == 'agregarRelacion') {
    $A_ADDRESS_ID = $_POST['ADDRESS_ID'];
    $A_ADDRESS_TYPE_CODE = $_POST['ADDRESS_TYPE_CODE'];
    $A_CUSTOMER_ID = $_POST['CUSTOMER_ID'];
    $A_DATE_ADDRESS_FROM = $_POST['DATE_ADDRESS_FROM'];
    $A_DATE_ADDRESS_TO = $_POST['DATE_ADDRESS_TO'];

    echo Addreess::insertRelation($A_ADDRESS_ID, $A_ADDRESS_TYPE_CODE, $A_CUSTOMER_ID, $A_DATE_ADDRESS_FROM, $A_DATE_ADDRESS_TO);
}

if (isset($_POST['line1'])) {
    $A_LINE1 = $_POST['line1'];
    $A_LINE2 = $_POST['line2'];
    $A_LINE3 = $_POST['line3'];
    $A_CITY = $_POST['city'];
    $A_COUNTRY = $_POST['country'];
    $A_ZIP_CODE = $_POST['zip_postcode'];
    $A_PROVINCE = $_POST['province'];
    $A_DETAILS = $_POST['otherDetails'];
    //var_dump($_POST);
    if (isset($_POST['metodo']) && $_POST['metodo'] == 'agregar') {
        echo Addreess::insertAdress($A_LINE1, $A_LINE2, $A_LINE3, $A_CITY, $A_COUNTRY, $A_ZIP_CODE, $A_PROVINCE, $A_DETAILS);
    } else
    if (isset($_POST['metodo']) && $_POST['metodo'] == 'editar') {
        $A_ID = $_POST['ADDRESS_ID'];
        echo Addreess::updateAddress($A_ID, $A_LINE1, $A_LINE2, $A_LINE3, $A_CITY, $A_COUNTRY, $A_ZIP_CODE, $A_PROVINCE, $A_DETAILS);
    }
}


if (isset($_GET['ADDRESS_ID']) && isset($_GET['metodo'])) {
    if ($_GET['metodo'] == 'delete') {
        Addreess::deleteAddress($_GET['ADDRESS_ID']);
    }
}
if (isset($_GET['R_ID']) && isset($_GET['metodo'])) {
    if ($_GET['metodo'] == 'delete') {
        Addreess::deleteRelationAddress($_GET['R_ID']);
    }
}
    