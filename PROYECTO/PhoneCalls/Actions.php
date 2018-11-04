<?php

include_once './PhoneCall.php';


if (isset($_POST['PHONE_CALL_ID'])) {


    $PHONE_CALL_ID = $_POST['PHONE_CALL_ID'];
    $CUSTOMER_PHONE_NUMBER = $_POST['CUSTOMER_PHONE_NUMBER'];
    $NUMBER_CALLED_TYPE_CODE = $_POST['NUMBER_CALLED_TYPE_CODE'];
    $NUMBER_CALLED = $_POST['NUMBER_CALLED'];
    $CALL_START_DATETIME = $_POST['CALL_START_DATETIME'];
    $CALL_END_DATETIME = $_POST['CALL_END_DATETIME'];
    $OTHER_DETAILS = $_POST['OTHER_DETAILS'];
    if (isset($_POST['metodo']) && $_POST['metodo'] == 'agregar') {
        echo PhoneCall::insertPhoneCall($PHONE_CALL_ID, $CUSTOMER_PHONE_NUMBER, $NUMBER_CALLED_TYPE_CODE, $NUMBER_CALLED, $CALL_START_DATETIME, $CALL_END_DATETIME, $OTHER_DETAILS);
    } else
    if (isset($_POST['metodo']) && $_POST['metodo'] == 'editar') {
        echo PhoneCall::updatePhoneCall($PHONE_CALL_ID, $CUSTOMER_PHONE_NUMBER, $NUMBER_CALLED_TYPE_CODE, $NUMBER_CALLED, $CALL_START_DATETIME, $CALL_END_DATETIME, $OTHER_DETAILS);
    }
}
if (isset($_GET['PHONE_CALL_ID']) && isset($_GET['metodo'])) {
    if ($_GET['metodo'] == 'delete') {
        PhoneCall::deletePhoneCall($_GET['PHONE_CALL_ID']);
    }
}