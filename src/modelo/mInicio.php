<?php

require_once __DIR__ .'/../modelo/conexion.php';

class MInicio extends Conexion{

    public function inciarSesion($nombreUsuario, $pw)
    {
        $sql = "SELECT nombreUsuario, password FROM usuarios WHERE nombreUsuario=:nombreUsuario";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':nombreUsuario', $nombreUsuario, PDO::PARAM_STR);

        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($pw, $usuario['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>