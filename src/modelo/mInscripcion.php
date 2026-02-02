<?php

require_once __DIR__ . '/conexion.php';

class MInscripcion extends conexion{

    public function listarDeportes()
    {
        $sql = "SELECT * FROM deportes";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>