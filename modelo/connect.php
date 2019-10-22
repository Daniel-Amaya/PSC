<?php

interface Notificaciones{
    public function notificaciones($idU);
}

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'peluditos_san_cristobal');

abstract class Conexion{

    private static $server = DB_SERVER;
    private static $user = DB_USER;
    private static $password = DB_PASSWORD;
    private static $dbName = DB_NAME;
    private $con;

    public function conectar(){
        try{
            $txt = "mysql:host=". self::$server . ";dbname=" . self::$dbName;
            $pdo = new PDO($txt, self::$user, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
        }catch(PDOException $e){
            exit("ERROR CONEXION: ".$e->getMessage());
        }
    }

    public function desconectar(){
        $this->con = null;
    }

}


?>