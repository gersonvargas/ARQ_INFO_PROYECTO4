<?php
include_once("../Conexion.php");
include_once("../App.php");
class Bill {

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

    public static function getBillID($ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM bill_headers WHERE BILL_HEADER_ID = '$ID'");

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
    
    public static function insertBill($Bill_Id,$Bill_PhoneNumber,$Bill_IssuedDate,$Bill_PaymentDueDate,$Bill_OriginalAmountDue,$Bill_AmountOutstanding) {
        $file_db = Conexion::getConexionPDO();
        try {
            $insert = "insert into PHONEBILL.bill_headers(BILL_HEADER_ID,PHONE_NUMBER,BILL_ISSUE_DATE,PAYMENT_DUE_DATE,ORIGINAL_AMOUNT_DUE,AMOUNT_OUTSTANDING)".
                       "VALUES(?,?,?,?,?,?)";
            $stmt = $file_db->prepare($insert);
            $stmt->bindParam(1, $Bill_Id, PDO::PARAM_INT); 
            $stmt->bindParam(2, $Bill_PhoneNumber, PDO::PARAM_STR); 
            $stmt->bindParam(3, $Bill_IssuedDate, PDO::PARAM_STR);
            $stmt->bindParam(4, $Bill_PaymentDueDate, PDO::PARAM_STR);  
            $stmt->bindParam(5, $Bill_OriginalAmountDue, PDO::PARAM_STR);
            $stmt->bindParam(6, $Bill_AmountOutstanding, PDO::PARAM_STR);
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

    public static function deleteBillDetails($Bill_Id) {
          
        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM PHONEBILL.bill_detail_lines WHERE BILL_HEADER_ID=".$Bill_Id;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

}
