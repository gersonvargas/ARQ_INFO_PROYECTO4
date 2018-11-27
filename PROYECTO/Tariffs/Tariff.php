<?php
include_once("../Conexion.php");
include_once("../App.php");
class Tariff {

    public static function getTariffs() {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT T.TARIFF_ID, REF_TARIFF_TYPES.TARIFF_TYPE_DESCRIPTION,".
            "T.TARIFF_NAME,T.TARIFF_RATE,T.TARIFF_DATAILS".
            " FROM TARIFFS T INNER JOIN REF_TARIFF_TYPES  ON T.TARIFF_TYPE_CODE = REF_TARIFF_TYPES.TARIFF_TYPE_CODE");
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

    public static function getTariffID($ID) {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT * FROM TARIFFS WHERE TARIFF_ID = '$ID'");

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

    public static function insertTariff($C_ID,$C_Type,$C_Name,$C_Rate,$C_Details) {
        $file_db = Conexion::getConexionPDO();
        try {
            $insert2 = "insert into TARIFFS(TARIFF_ID,TARIFF_TYPE_CODE,TARIFF_NAME,TARIFF_RATE,TARIFF_DATAILS)".
                       "VALUES(?,?,?,?,?)";
            $stmt = $file_db->prepare($insert2);
            $stmt->bindParam(1, $C_ID, PDO::PARAM_INT); 
            $stmt->bindParam(2, $C_Type, PDO::PARAM_INT); 
            $stmt->bindParam(3, $C_Name, PDO::PARAM_STR);
            $stmt->bindParam(4, $C_Rate, PDO::PARAM_INT);  
            $stmt->bindParam(5, $C_Details, PDO::PARAM_STR);
            $stmt->execute();  
            header("Location: ListTariffs.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function updateTariff($C_ID,$C_TYPE,$C_NAME,$C_RATE,$C_DETAILS) {
        $file_db = Conexion::getConexionPDO();
        try {
            $stmt = $file_db->prepare("update TARIFFS ".
                                      "SET TARIFF_NAME = ?,".
                                      "TARIFF_TYPE_CODE = ?,".
                                      "TARIFF_RATE = ?,".
                                      "TARIFF_DATAILS = ?".
                                      "WHERE TARIFF_ID = ?");
            $stmt->bindParam(1, $C_NAME, PDO::PARAM_STR); 
            $stmt->bindParam(2, $C_TYPE, PDO::PARAM_INT); 
            $stmt->bindParam(3, $C_RATE, PDO::PARAM_INT);
            $stmt->bindParam(4, $C_DETAILS, PDO::PARAM_STR);  
            $stmt->bindParam(5, $C_ID, PDO::PARAM_INT);
            $stmt->execute();   
            header("Location: ListTariffs.php");        
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

    public static function deleteTariff($C_ID) {
          
        $file_db = Conexion::getConexionPDO();
        try {
            $DELETE = "DELETE FROM TARIFFS WHERE TARIFF_ID=".$C_ID;
            $stmt2 = $file_db->prepare($DELETE);
            $stmt2->execute();
           // var_dump($stmt2->rowCount());
          header("Location: ListTariffs.php");
        } catch (Exception $e) {
            return App::error($e->getMessage());
        } finally {
            
        }
    }

}
