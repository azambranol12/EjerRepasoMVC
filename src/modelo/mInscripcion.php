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

    public function insertarDatos($nombreUsuario, $nombreApellido, $pw, $correo, $telefono, $deportes ){

        $sql = "SELECT nombreUsuario, correo FROM usuarios WHERE nombreUsuario= :nombreUsuario OR correo= :correo";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':nombreUsuario', $nombreUsuario, PDO::PARAM_STR);

        $stmt->execute();

        if($stmt->fetchColumn()>0){
            return 'Correo o contraseña ya en la base de datos.';
        }

        $perfil = 'u';

        $sql = 'INSERT INTO usuarios(nombreUsuario, apeNombre, password, correo, telefono, perfil) VALUES (:nombreUsuario, :nombreApellido, :pw, :correo, :telefono, :perfil)';
        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':nombreUsuario', $nombreUsuario, PDO::PARAM_STR);
        $stmt->bindParam(':nombreApellido', $nombreApellido, PDO::PARAM_STR);
        $stmt->bindParam(':pw', $pw, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':perfil', $perfil, PDO::PARAM_STR);

        $ok = $stmt->execute();

        $id = $this->conexion->lastInsertId();

        foreach($deportes as $deporte)
            {
                $sql = 'INSERT INTO usuarios_deportes VALUES (:idDeporte, :idUsuario)';
                $stmt = $this->conexion->prepare($sql);
                $stmt->bindParam(':idDeporte', $deporte, PDO::PARAM_INT);
                $stmt->bindParam(':idUsuario', $id, PDO::PARAM_INT);
                $stmt->execute();
            }

        if($ok){
            return true;
        }else{
            return false;
        }
    }
}

?>