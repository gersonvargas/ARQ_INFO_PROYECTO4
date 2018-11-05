<?php
include_once("../Conexion.php");
include_once("../App.php");
class BillDetail {

    public static function getBills($BILL_HEADER_ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT BillDetail.BILL_DETAIL_LINE_ID,".
            "Bill.BILL_HEADER_ID,PhoneNumber.CUSTOMER_PHONE_NUMBER,Tariff.TARIFF_ID,".
            "Tariff.TARIFF_NAME,BillDetail.CALL_DURATION,BillDetail.CALL_COST ".
            "FROM bill_detail_lines BillDetail INNER JOIN bill_headers Bill ".
            "ON BillDetail.BILL_HEADER_ID = Bill.BILL_HEADER_ID ".
            "INNER JOIN customer_phone_numbers PhoneNumber ".
            "ON Bill.PHONE_NUMBER = PhoneNumber.CUSTOMER_PHONE_NUMBER ".
            "INNER JOIN tariffs Tariff ON BillDetail.TARIFF_ID = Tariff.TARIFF_ID WHERE Bill.BILL_HEADER_ID='$BILL_HEADER_ID'");
            $stmt->execute();
            $data = Array();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $result;
            }
            //var_dump($data);
            return $data;
        } catch (Exception $e) {
            echo App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function getBillDetailById($ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT BillDetail.BILL_DETAIL_LINE_ID,".
            "Bill.BILL_HEADER_ID,PhoneNumber.CUSTOMER_PHONE_NUMBER,Tariff.TARIFF_ID,".
            "Tariff.TARIFF_NAME,BillDetail.CALL_DURATION,BillDetail.CALL_COST ".
            "FROM bill_detail_lines BillDetail INNER JOIN bill_headers Bill ".
            "ON BillDetail.BILL_HEADER_ID = Bill.BILL_HEADER_ID ".
            "INNER JOIN customer_phone_numbers PhoneNumber ".
            "ON Bill.PHONE_NUMBER = PhoneNumber.CUSTOMER_PHONE_NUMBER ".
            "INNER JOIN tariffs Tariff ON BillDetail.TARIFF_ID = Tariff.TARIFF_ID ".
            "WHERE BILL_DETAIL_LINE_ID = '$ID'");

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
    
    public static function insertBillDetail($billDetailId,$billId,$phoneCall,$tariff,$callDuration,$callCost) {
        $file_db = Conexion::getConexionPDO();
        try {
            $insert = "insert into PHONEBILL.bill_detail_lines(BILL_DETAIL_LINE_ID,BILL_HEADER_ID,PHONE_CALL_ID,TARIFF_ID,CALL_DURATION,CALL_COST)".
                       "VALUES(?,?,?,?,?,?)";
            $stmt = $file_db->prepare($insert);
            $stmt->bindParam(1, $billDetailId, PDO::PARAM_INT); 
            $stmt->bindParam(2, $billId, PDO::PARAM_INT); 
            $stmt->bindParam(3, $phoneCall, PDO::PARAM_INT);
            $stmt->bindParam(4, $tariff, PDO::PARAM_INT);  
            $stmt->bindParam(5, $callDuration, PDO::PARAM_STR);
            $stmt->bindParam(6, $callCost, PDO::PARAM_STR);
            $stmt->execute();  
            header("Location: ListBillDetail.php?BILL_HEADER_ID=$billId");  
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function updateBillDetail($billDetailId,$billId,$phoneCall,$tariff,$callDuration,$callCost) {
        $file_db = Conexion::getConexionPDO();
        try {
            $stmt = $file_db->prepare("UPDATE PHONEBILL.bill_detail_lines ".
                                      "SET BILL_HEADER_ID = ?,".
                                      "PHONE_CALL_ID = ?,".
                                      "TARIFF_ID = ?,".
                                      "CALL_DURATION = ?,".
                                      "CALL_COST = ?".
                                      "WHERE BILL_DETAIL_LINE_ID = ?");
            $stmt->bindParam(1, $billId, PDO::PARAM_INT); 
            $stmt->bindParam(2, $phoneCall, PDO::PARAM_INT); 
            $stmt->bindParam(3, $tariff, PDO::PARAM_INT);
            $stmt->bindParam(4, $callDuration, PDO::PARAM_STR);  
            $stmt->bindParam(5, $callCost, PDO::PARAM_STR);
            $stmt->bindParam(6, $billDetailId, PDO::PARAM_INT);
            $stmt->execute();   
            header("Location: ListBillDetail.php");        
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function deleteBillDetail($Bill_Id) {
          
        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM PHONEBILL.bill_detail_lines WHERE BILL_DETAIL_LINE_ID=".$Bill_Id;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
           // var_dump($stmt2->rowCount());
          header("Location: ListBillDetail.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

}
