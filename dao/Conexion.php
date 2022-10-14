<?php

require "configDb.php";

class Conexion{

    public static function conectar(){
        $h = HOST;
        $u = USER;
        $p = PASSWORD;
        $db = DB;

        try {
            $conn = new PDO("mysql:host=$h;dbname=$db", $u, $p);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
          } catch(PDOException $e) {
            die( "Connection failed: " . $e->getMessage());
          }
          return $conn;
    }

}