<?php


        $conexion = null;
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=id7841828_phonebill', 'id7841828_admin', 'admin');
        } catch (Exception $e) {
            return false;
        }
        if($conexion){
            echo 'correcto';
        }else{
            echo 'error';
        }
    
