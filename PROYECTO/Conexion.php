<?php

class Conexion
{
    private static function init()
    {
        $conexion = null;
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=PHONEBILL', 'root', 'root');
        } catch (Exception $e) {
            return false;
        }
        return $conexion;
    }

     private static function initNUBE()
    {
        $conexion = null;
        try {
            $conexion = new PDO('mysql:host=sql3.freemysqlhosting.net;dbname=sql3265636', 'sql3265636', 'kLdTRzeLBU');
        } catch (Exception $e) {
            return false;
        }
        return $conexion;
    }

    public static function getConexionPDO($id = null)
    {
        //return Conexion::obtenerconexion();
       return Conexion::initNUBE();
    }
    
      public static function obtenerconexionSQLLITE()
    {
        $file_db = new PDO('sqlite:PHONEBILL.db');
        // Set errormode to exceptions
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $file_db;
    }
}
