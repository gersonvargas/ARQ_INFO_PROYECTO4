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

    public static function getConexionPDO($id = null)
    {
        return Conexion::init();
    }
}
