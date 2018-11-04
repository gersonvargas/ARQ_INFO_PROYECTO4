<?php

include_once("../Conexion.php");
include_once("../App.php");

class PhoneCall {

    public static function getPhoneCalls() {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * "
                    . " FROM PHONEBILL.CUSTOMER_PHONE_CALLS");
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

    public static function getPhoneCallsID($CUST_ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT  "
                    . "PHONE_CALL_ID,
   CUSTOMER_PHONE_NUMBER,
   NUMBER_CALLED_TYPE_CODE,
   NUMBER_CALLED,
   DATE_FORMAT(CALL_START_DATETIME, '%Y-%m-%dT%H:%i') CALL_START_DATETIME,
   DATE_FORMAT(CALL_END_DATETIME, '%Y-%m-%dT%H:%i') CALL_END_DATETIME,
   OTHER_DETAILS "
                    . "FROM CUSTOMER_PHONE_CALLS WHERE PHONE_CALL_ID = '$CUST_ID'");

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

    public static function insertPhoneCall($PHONE_CALL_ID, $CUSTOMER_PHONE_NUMBER, $NUMBER_CALLED_TYPE_CODE, $NUMBER_CALLED, $CALL_START_DATETIME, $CALL_END_DATETIME, $OTHER_DETAILS) {
        $file_db = Conexion::getConexionPDO();
        try {
            $insert2 = "insert into PHONEBILL.CUSTOMER_PHONE_CALLS " .
                    " VALUES (:PHONE_CALL_ID, :CUSTOMER_PHONE_NUMBER, :NUMBER_CALLED_TYPE_CODE, "
                    . ":NUMBER_CALLED, :CALL_START_DATETIME, :CALL_END_DATETIME,:OTHER_DETAILS)";
            $stmt2 = $file_db->prepare($insert2);
            $stmt2->bindParam(':PHONE_CALL_ID', $PHONE_CALL_ID);
            $stmt2->bindParam(':CUSTOMER_PHONE_NUMBER', $CUSTOMER_PHONE_NUMBER);
            $stmt2->bindParam(':NUMBER_CALLED_TYPE_CODE', $NUMBER_CALLED_TYPE_CODE);
            $stmt2->bindParam(':NUMBER_CALLED', $NUMBER_CALLED);
            $stmt2->bindParam(':CALL_START_DATETIME', $CALL_START_DATETIME);
            $stmt2->bindParam(':CALL_END_DATETIME', $CALL_END_DATETIME);
            $stmt2->bindParam(':OTHER_DETAILS', $OTHER_DETAILS);
            $stmt2->execute();
            header("Location: ListPhoneCalls.php?metodo=buscar&busqueda=" . $PHONE_CALL_ID);
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function updatePhoneCall($PHONE_CALL_ID, $CUSTOMER_PHONE_NUMBER, $NUMBER_CALLED_TYPE_CODE, $NUMBER_CALLED, $CALL_START_DATETIME, $CALL_END_DATETIME, $OTHER_DETAILS) {
        $file_db = Conexion::getConexionPDO();
        try {
            $UPDATE = "UPDATE  PHONEBILL.CUSTOMER_PHONE_CALLS SET " .
                    " CUSTOMER_PHONE_NUMBER= :CUSTOMER_PHONE_NUMBER, "
                    . "NUMBER_CALLED_TYPE_CODE= :NUMBER_CALLED_TYPE_CODE,NUMBER_CALLED= :NUMBER_CALLED,CALL_START_DATETIME= :CALL_START_DATETIME,"
                    . "CALL_END_DATETIME=:CALL_END_DATETIME,OTHER_DETAILS=:OTHER_DETAILS WHERE PHONE_CALL_ID= :PHONE_CALL_ID";
            $stmt2 = $file_db->prepare($UPDATE);
            $stmt2->bindParam(':PHONE_CALL_ID', $PHONE_CALL_ID);
            $stmt2->bindParam(':CUSTOMER_PHONE_NUMBER', $CUSTOMER_PHONE_NUMBER);
            $stmt2->bindParam(':NUMBER_CALLED_TYPE_CODE', $NUMBER_CALLED_TYPE_CODE);
            $stmt2->bindParam(':NUMBER_CALLED', $NUMBER_CALLED);
            $stmt2->bindParam(':CALL_START_DATETIME', $CALL_START_DATETIME);
            $stmt2->bindParam(':CALL_END_DATETIME', $CALL_END_DATETIME);
            $stmt2->bindParam(':OTHER_DETAILS', $OTHER_DETAILS);
            $stmt2->execute();
            header("Location: ListPhoneCalls.php?metodo=buscar&busqueda=" . $PHONE_CALL_ID);
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function deletePhoneCall($C_ID) {

        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM PHONEBILL.CUSTOMER_PHONE_CALLS WHERE PHONE_CALL_ID=" . $C_ID;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
            // var_dump($stmt2->rowCount());
            header("Location: ListPhoneCalls.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

}
