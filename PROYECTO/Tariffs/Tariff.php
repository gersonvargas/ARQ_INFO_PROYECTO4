<?php
include_once("../Conexion.php");
include_once("../App.php");
class Tariff {

    public static function getTariffs() {
        $dbh = Conexion::getConexionPDO();
        try {
            $stmt = $dbh->prepare("SELECT Tariff.TARIFF_ID, TariffType.TARIFF_TYPE_DESCRIPTION,".
            "Tariff.TARIFF_NAME,Tariff.TARIFF_RATE,Tariff.TARIFF_DATAILS".
            " FROM Tariffs Tariff INNER JOIN ref_tariff_types TariffType ON Tariff.TARIFF_TYPE_CODE = TariffType.TARIFF_TYPE_CODE");
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
