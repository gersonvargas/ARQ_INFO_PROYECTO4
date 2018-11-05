<?php

include_once './BillDetail.php';

if (isset($_POST['billDetailId'])) {    
    $billDetailId = $_POST['billDetailId'];
    $billId = $_POST['billId'];
    $phoneCall = $_POST['phoneCall'];
    $tariff = $_POST['tariff'];  
    $callDuration = $_POST['callDuration'];
    $callCost = $_POST['callCost'];

    if (isset($_POST['metodo']) && $_POST['metodo'] == 'agregar') {
        echo BillDetail::insertBillDetail($billDetailId,$billId,$phoneCall,$tariff,$callDuration,$callCost);        
    }else {
        if (isset($_POST['metodo']) && $_POST['metodo'] == 'editar') {

            $RES=json_decode(BillDetail::updateBillDetail($billDetailId,$billId,$phoneCall,$tariff,$callDuration,$callCost));
        }
    }
}
if (isset($_GET['BILL_DETAIL_LINE_ID']) && isset($_GET['metodo'])) {
    if($_GET['metodo']=='delete'){
        BillDetail::deleteBillDetail($_GET['BILL_DETAIL_LINE_ID']);
    }
    
}