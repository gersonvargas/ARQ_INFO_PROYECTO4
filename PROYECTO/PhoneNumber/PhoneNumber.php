<?php

include_once("../Conexion.php");
include_once("../App.php");

class PhoneNumber {

    public static function getPhoneNumbers() {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM PHONEBILL.CUSTOMER_PHONE_NUMBERS");
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

    public static function getPhoneNumberID($CUST_ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM CUSTOMER_PHONE_NUMBERS WHERE CUSTOMER_PHONE_NUMBER = '$CUST_ID'");

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

    public static function insertPhoneNumber($CUSTOMER_PHONE_NUMBER, $CUSTOMER_ID, $NUMBER_TYPE_CODE, $HELD_FROM_DATE, $HELD_TO_DATE, $OTHER_DETAILS) {

        $file_db = Conexion::getConexionPDO();
        try {
            $insert2 = "insert into PHONEBILL.CUSTOMER_PHONE_NUMBERS " .
                    " VALUES (:CUSTOMER_PHONE_NUMBER, :CUSTOMER_ID, :NUMBER_TYPE_CODE, "
                    . ":HELD_FROM_DATE, :HELD_TO_DATE, :OTHER_DETAILS)";
            $stmt2 = $file_db->prepare($insert2);
            $stmt2->bindParam(':CUSTOMER_PHONE_NUMBER', $CUSTOMER_PHONE_NUMBER);
            $stmt2->bindParam(':CUSTOMER_ID', $CUSTOMER_ID);
            $stmt2->bindParam(':NUMBER_TYPE_CODE', $NUMBER_TYPE_CODE);
            $stmt2->bindParam(':HELD_FROM_DATE', $HELD_FROM_DATE);
            $stmt2->bindParam(':HELD_TO_DATE', $HELD_TO_DATE);
            $stmt2->bindParam(':OTHER_DETAILS', $OTHER_DETAILS);
            $stmt2->execute();
            header("Location: ListPhoneNumbers.php?metodo=buscar&busqueda=" . $CUSTOMER_PHONE_NUMBER);
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

   public static function updatePhoneNumber($CUSTOMER_PHONE_NUMBER, $CUSTOMER_ID, $NUMBER_TYPE_CODE, $HELD_FROM_DATE, $HELD_TO_DATE, $OTHER_DETAILS) {

        $file_db = Conexion::getConexionPDO();
        try {
            $UPDATE = "UPDATE  PHONEBILL.CUSTOMER_PHONE_NUMBERS SET " .
                    " CUSTOMER_ID= :CUSTOMER_ID, NUMBER_TYPE_CODE= :NUMBER_TYPE_CODE, "
                    . "HELD_FROM_DATE= :HELD_FROM_DATE,HELD_TO_DATE= :HELD_TO_DATE,OTHER_DETAILS= :OTHER_DETAILS WHERE CUSTOMER_PHONE_NUMBER= :CUSTOMER_PHONE_NUMBER";
            $stmt2 = $file_db->prepare($UPDATE);
            $stmt2->bindParam(':CUSTOMER_PHONE_NUMBER', $CUSTOMER_PHONE_NUMBER);
            $stmt2->bindParam(':CUSTOMER_ID', $CUSTOMER_ID);
            $stmt2->bindParam(':NUMBER_TYPE_CODE', $NUMBER_TYPE_CODE);
            $stmt2->bindParam(':HELD_FROM_DATE', $HELD_FROM_DATE);
            $stmt2->bindParam(':HELD_TO_DATE', $HELD_TO_DATE);
            $stmt2->bindParam(':OTHER_DETAILS', $OTHER_DETAILS);
            $stmt2->execute();
            header("Location: ListPhoneNumbers.php?metodo=buscar&busqueda=" . $CUSTOMER_PHONE_NUMBER);
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function deletePhoneNumber($C_ID) {

        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM PHONEBILL.CUSTOMER_PHONE_NUMBERS WHERE CUSTOMER_PHONE_NUMBER=" . $C_ID;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
            // var_dump($stmt2->rowCount());
            header("Location: ListPhoneNumbers.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

}
