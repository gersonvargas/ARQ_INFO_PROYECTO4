<?php
include_once("../Conexion.php");
include_once("../App.php");
class BillDetail {

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
            header("Location: ListBill.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function updateBill($Bill_Id,$Bill_PhoneNumber,$Bill_IssuedDate,$Bill_PaymentDueDate,$Bill_OriginalAmountDue,$Bill_AmountOutstanding) {
        $file_db = Conexion::getConexionPDO();
        try {
            $stmt = $file_db->prepare("UPDATE PHONEBILL.bill_headers ".
                                      "SET PHONE_NUMBER = ?,".
                                      "BILL_ISSUE_DATE = ?,".
                                      "PAYMENT_DUE_DATE = ?,".
                                      "ORIGINAL_AMOUNT_DUE = ?,".
                                      "AMOUNT_OUTSTANDING = ?".
                                      "WHERE BILL_HEADER_ID = ?");
            $stmt->bindParam(1, $Bill_PhoneNumber, PDO::PARAM_STR); 
            $stmt->bindParam(2, $Bill_IssuedDate, PDO::PARAM_STR); 
            $stmt->bindParam(3, $Bill_PaymentDueDate, PDO::PARAM_STR); 
            $stmt->bindParam(4, $Bill_OriginalAmountDue, PDO::PARAM_STR); 
            $stmt->bindParam(5, $Bill_AmountOutstanding, PDO::PARAM_STR); 
            $stmt->bindParam(6, $Bill_Id, PDO::PARAM_INT);
            $stmt->execute();   
            header("Location: ListBill.php");        
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function deleteBill($Bill_Id) {
          
        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM PHONEBILL.bill_headers WHERE BILL_HEADER_ID=".$Bill_Id;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
           // var_dump($stmt2->rowCount());
          header("Location: ListBill.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

}
