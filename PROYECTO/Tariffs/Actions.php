<?php

include_once './Tariff.php';


if (isset($_POST['tariffId']) && isset($_POST['tariffName'])) {    
    $C_ID = $_POST['tariffId'];
    $C_TYPE = $_POST['tariffType'];
    $C_NAME = $_POST['tariffName'];
    $C_RATE = $_POST['tariffRate'];
    $C_DETAILS = $_POST['tariffDetails'];

    if (isset($_POST['metodo']) && $_POST['metodo'] == 'agregar') {
        
        echo Tariff::insertTariff($C_ID,$C_TYPE,$C_NAME,$C_RATE,$C_DETAILS);        
    }else {
        if (isset($_POST['metodo']) && $_POST['metodo'] == 'editar') {

            $RES=json_decode(Tariff::updateTariff($C_ID,$C_TYPE,$C_NAME,$C_RATE,$C_DETAILS));
        }
    }
}
if (isset($_GET['TARIFF_ID']) && isset($_GET['metodo'])) {
    if($_GET['metodo']=='delete'){
        Tariff::deleteTariff($_GET['TARIFF_ID']);
    }
    
}