<?php

include_once("../Conexion.php");
include_once("../App.php");

class Addreess {

    public static function getAddresses() {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM addresses");
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

    public static function getAddressesRelations() {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT customer_addresses.CUSTOMER_ADDRESS_ID,addresses.ADDRESS_ID,customer.CUSTOMER_ID,customer.CUSTOMER_NAME," .
                    "ref_address_type.ADDRESS_TYPE_CODE ,ref_address_type.ADDRESS_TYPE_DESCRIPTION" .
                    " FROM PHONEBILL.customer_addresses" .
                    " LEFT JOIN PHONEBILL.addresses ON addresses.ADDRESS_ID = customer_addresses.ADDRESS_ID" .
                    " LEFT JOIN PHONEBILL.customer ON customer.CUSTOMER_ID = customer_addresses.CUSTOMER_ID" .
                    " LEFT JOIN PHONEBILL.ref_address_type ON ref_address_type.ADDRESS_TYPE_CODE = customer_addresses.ADDRESS_TYPE_CODE;");
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

    public static function getAddressID($ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM ADDRESSES WHERE ADDRESS_ID = '$ID'");

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

    public static function insertAdress($A_LINE1, $A_LINE2, $A_LINE3, $A_CITY, $A_COUNTRY, $A_ZIP_CODE, $A_PROVINCE, $A_DETAILS) {
        $file_db = Conexion::getConexionPDO();
        try {
            $insert2 = "insert into PHONEBILL.ADDRESSES " .
                    "(`LINE1`,`LINE2`,`LINE3`,`CITY`,`ZIP_POSTCODE`,`STATE_PROVINCE_COUNTRY`,`COUNTRY`,`OTHER_DETAILS`)
                VALUES (:LINE1, :LINE2, :LINE3, :CITY, :ZIP_POSTCODE, :STATE_PROVINCE_COUNTRY,:COUNTRY,:OTHER_DETAILS)";
            $stmt2 = $file_db->prepare($insert2);
            $stmt2->bindParam(':LINE1', $A_LINE1);
            $stmt2->bindParam(':LINE2', $A_LINE2);
            $stmt2->bindParam(':LINE3', $A_LINE3);
            $stmt2->bindParam(':CITY', $A_CITY);
            $stmt2->bindParam(':ZIP_POSTCODE', $A_ZIP_CODE);
            $stmt2->bindParam(':STATE_PROVINCE_COUNTRY', $A_PROVINCE);
            $stmt2->bindParam(':COUNTRY', $A_COUNTRY);
            $stmt2->bindParam(':OTHER_DETAILS', $A_DETAILS);
            $stmt2->execute();
            header("Location: ListAddress.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function updateAddress($A_ID,$A_LINE1, $A_LINE2, $A_LINE3, $A_CITY, $A_COUNTRY, $A_ZIP_CODE, $A_PROVINCE, $A_DETAILS) {

        $file_db = Conexion::getConexionPDO();
        try {
            $insert2 = "UPDATE PHONEBILL.ADDRESSES SET" .
                    "`LINE1` = :LINE1,`LINE2` = :LINE2,`LINE3` = :LINE3," .
                    "`CITY` = :CITY,`ZIP_POSTCODE`= :ZIP_POSTCODE,`STATE_PROVINCE_COUNTRY`= :STATE_PROVINCE_COUNTRY,`COUNTRY`= :COUNTRY,`OTHER_DETAILS`= :OTHER_DETAILS" .
                    " WHERE ADDRESS_ID = :ADDRESS_ID";
           $stmt2 = $file_db->prepare($insert2);
            $stmt2->bindParam(':LINE1', $A_LINE1);
            $stmt2->bindParam(':LINE2', $A_LINE2);
            $stmt2->bindParam(':LINE3', $A_LINE3);
            $stmt2->bindParam(':CITY', $A_CITY);
            $stmt2->bindParam(':ZIP_POSTCODE', $A_ZIP_CODE);
            $stmt2->bindParam(':STATE_PROVINCE_COUNTRY', $A_PROVINCE);
            $stmt2->bindParam(':COUNTRY', $A_COUNTRY);
            $stmt2->bindParam(':OTHER_DETAILS', $A_DETAILS);
            $stmt2->bindParam(':ADDRESS_ID', $A_ID);
            $stmt2->execute();
            header("Location: ListAddress.php?metodo=buscar&busqueda=" . $A_ID);
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
        }
    }

    public static function deleteAddress($A_ID) {

        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM PHONEBILL.ADDRESSES WHERE ADDRESS_ID=" . $A_ID;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
            // var_dump($stmt2->rowCount());
            header("Location: ListAddress.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }
    
       public static function deleteRelationAddress($R_ID) {

        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM PHONEBILL.CUSTOMER_ADDRESSES WHERE CUSTOMER_ADDRESS_ID=" . $R_ID;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
            // var_dump($stmt2->rowCount());
            header("Location: AddressRelations.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

}
