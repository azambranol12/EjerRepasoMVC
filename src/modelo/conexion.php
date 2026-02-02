<?php
    require_once __DIR__ . '/../config/configDB.php';

    class Conexion{

    protected $conexion;

    public function __construct()
    {
        $this->conexion = new PDO("mysql:host=" .servidor. ";dbname=" .nombreDb. ";charset=UTF8", usuario, password);
    }

    public function __destruct()
    {
            $this->conexion = null;
    }

}
?>