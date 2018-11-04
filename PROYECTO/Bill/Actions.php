<?php

include_once './Bill.php';

if (isset($_POST['billId'])) {    
    $Bill_Id = $_POST['billId'];
    $Bill_PhoneNumber = $_POST['billPhoneNumber'];
    $Bill_IssuedDate = $_POST['billIssuedDate'];
    $Bill_PaymentDueDate = $_POST['paymentDueDate'];
    $Bill_OriginalAmountDue = $_POST['originalAmountDue'];   
    $Bill_AmountOutstanding = $_POST['amountOutstanding'];
    if (isset($_POST['metodo']) && $_POST['metodo'] == 'agregar') {
        echo Bill::insertBill($Bill_Id,$Bill_PhoneNumber,$Bill_IssuedDate,$Bill_PaymentDueDate,$Bill_OriginalAmountDue,$Bill_AmountOutstanding);        
    }else {
        if (isset($_POST['metodo']) && $_POST['metodo'] == 'editar') {

            $RES=json_decode(Bill::updateBill($Bill_Id,$Bill_PhoneNumber,$Bill_IssuedDate,$Bill_PaymentDueDate,$Bill_OriginalAmountDue,$Bill_AmountOutstanding));
        }
    }
}
if (isset($_GET['BILL_HEADER_ID']) && isset($_GET['metodo'])) {
    if($_GET['metodo']=='delete'){
        Bill::deleteBillDetails($_GET['BILL_HEADER_ID']);
        Bill::deleteBill($_GET['BILL_HEADER_ID']);
    }
    
}