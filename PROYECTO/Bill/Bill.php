<?php
include_once("../Conexion.php");
include_once("../App.php");
class Tariff {

    public static function getBills() {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT bill.BILL_HEADER_ID,".
                                          "phoneNumber.CUSTOMER_PHONE_NUMBER,".
                                          "bill.BILL_ISSUE_DATE,".
                                          "bill.PAYMENT_DUE_DATE,".
                                          "bill.ORIGINAL_AMOUNT_DUE,".
                                          "bill.AMOUNT_OUTSTANDING ".
                                          "FROM bill_headers bill ".
                                          "INNER JOIN customer_phone_numbers phoneNumber ".
                                          "ON bill.PHONE_NUMBER = phoneNumber.CUSTOMER_PHONE_NUMBER");
            $stmt->execute();
            $data = Array();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $result;
            }
            return $data;
        } catch (Exception $e) {
            echo App::error($e->getMessage());
        } finally {
            
        }
    }

}
