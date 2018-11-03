<?php

include_once("../Conexion.php");
include_once("../App.php");

class Customer {

    public static function getCustomers() {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM CUSTOMER");
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

    public static function getCustomerID($ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM CUSTOMER WHERE CUSTOMER_ID = '$ID'");

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

    public static function getCustomerName($ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM CUSTOMER WHERE CUSTOMER_NAME LIKE '$ID%'");

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
      public static function insertCustomer($C_ID,$C_NAME,$C_EMAIL,$C_TYPE,$C_DIRECTION,$C_DETAILS) {
          
        $file_db = Conexion::getConexionPDO();
        try {
            $insert2 = "insert into PHONEBILL.CUSTOMER ".
                       "(`CUSTOMER_ID`,`CUSTOMER_NAME`,`CUSTOMER_EMAIL`,`CUSTOMER_ADDRESS`,`COMMERCIAL_OR_DOMAESTIC`,`OTHER_DETAILS`)
                VALUES (:CUSTOMER_ID, :CUSTOMER_NAME, :CUSTOMER_EMAIL, :CUSTOMER_ADDRESS, :COMMERCIAL_OR_DOMAESTIC, :OTHER_DETAILS)";
            $stmt2 = $file_db->prepare($insert2);
            $stmt2->bindParam(':CUSTOMER_ID', $C_ID);
            $stmt2->bindParam(':CUSTOMER_NAME', $C_NAME);
            $stmt2->bindParam(':CUSTOMER_EMAIL',$C_EMAIL);
            $stmt2->bindParam(':CUSTOMER_ADDRESS', $C_DIRECTION);
            $stmt2->bindParam(':COMMERCIAL_OR_DOMAESTIC', $C_TYPE);
            $stmt2->bindParam(':OTHER_DETAILS', $C_DETAILS);
            $stmt2->execute();
           header("Location: ListCustomer.php?metodo=buscar&busqueda=".$C_NAME);
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }
    public static function updateCustomer($C_ID,$C_NAME,$C_EMAIL,$C_TYPE,$C_DIRECTION,$C_DETAILS) {
          
        $file_db = Conexion::getConexionPDO();
        try {
            $UPDATE = "UPDATE PHONEBILL.CUSTOMER SET".
                       "`CUSTOMER_NAME` = :CUSTOMER_NAME, ".
                    "`CUSTOMER_EMAIL` = :CUSTOMER_EMAIL,`CUSTOMER_ADDRESS` = :CUSTOMER_ADDRESS,".
                    "`COMMERCIAL_OR_DOMAESTIC` = :COMMERCIAL_OR_DOMAESTIC,`OTHER_DETAILS` = :OTHER_DETAILS"
                
                    ." WHERE CUSTOMER_ID = :CUSTOMER_ID";
            //UPDATE compras SET `total` = :TOTAL, `subtotal` = :SUBTOTAL WHERE (`id` = :IDCOMPRA);
            $stmt2 = $file_db->prepare($UPDATE);
            $stmt2->bindParam(':CUSTOMER_ID', $C_ID);
            $stmt2->bindParam(':CUSTOMER_NAME', $C_NAME);
            $stmt2->bindParam(':CUSTOMER_EMAIL',$C_EMAIL);
            $stmt2->bindParam(':CUSTOMER_ADDRESS', $C_DIRECTION);
            $stmt2->bindParam(':COMMERCIAL_OR_DOMAESTIC', $C_TYPE);
            $stmt2->bindParam(':OTHER_DETAILS', $C_DETAILS);
            $stmt2->execute();
           // var_dump($stmt2->rowCount());
          header("Location: ListCustomer.php?metodo=buscar&busqueda=".$C_NAME);
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }
 public static function deleteCustomer($C_ID) {
          
        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM PHONEBILL.CUSTOMER WHERE CUSTOMER_ID=".$C_ID;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
           // var_dump($stmt2->rowCount());
          header("Location: ListCustomer.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }
}
