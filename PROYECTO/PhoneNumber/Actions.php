<?php

include_once './PhoneNumber.php';


if (isset($_POST['CUSTOMER_PHONE_NUMBER'])) {

    $CUSTOMER_PHONE_NUMBER = $_POST['CUSTOMER_PHONE_NUMBER'];
    $CUSTOMER_ID = $_POST['CUSTOMER_ID'];
    $NUMBER_TYPE_CODE = $_POST['NUMBER_TYPE_CODE'];
    $HELD_FROM_DATE = $_POST['HELD_FROM_DATE'];
    $HELD_TO_DATE = $_POST['HELD_TO_DATE'];
    $OTHER_DETAILS = $_POST['OTHER_DETAILS'];

    if (isset($_POST['metodo']) && $_POST['metodo'] == 'agregar') {
        echo PhoneNumber::insertPhoneNumber($CUSTOMER_PHONE_NUMBER, $CUSTOMER_ID, $NUMBER_TYPE_CODE, $HELD_FROM_DATE, $HELD_TO_DATE, $OTHER_DETAILS);
    } else
    if (isset($_POST['metodo']) && $_POST['metodo'] == 'editar') {
        echo PhoneNumber::updatePhoneNumber($CUSTOMER_PHONE_NUMBER, $CUSTOMER_ID, $NUMBER_TYPE_CODE, $HELD_FROM_DATE, $HELD_TO_DATE, $OTHER_DETAILS);
    }
}
if (isset($_GET['CUSTOMER_PHONE_NUMBER']) && isset($_GET['metodo'])) {
    if ($_GET['metodo'] == 'delete') {
        PhoneNumber::deletePhoneNumber($_GET['CUSTOMER_PHONE_NUMBER']);
    }
}