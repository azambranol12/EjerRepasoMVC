<?php

require_once __DIR__ . '/../modelo/mInscripcion.php';

class CInscripcion{

    public $vista;
    public $objModelo;
    public $mensaje;
    public $errorTipo;

    public function __construct()
    {
        $this->objModelo = new MInscripcion();
        $this->vista = '';
    }

    public function inscripcion()
    {
        $datos['deportes'] = $this->objModelo->listarDeportes();
        $this->vista='Inscripcion';
        return $datos;
    }

    public function guardarDatos()
    {
        $nombreUsuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
        $nombreApellido = isset($_POST['nombreApellido']) ? trim($_POST['nombreApellido']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';
        $telefono = trim($_POST['telefono'] ?? '') ?: null;

        $deportes = []; 

        if (!empty($_POST['deporte'])) {
            foreach ($_POST['deporte'] as $d) {
                $deportes[] = trim($d); // agregamos cada valor limpio
            }
        }

        if (empty($nombreUsuario) || empty($nombreApellido) || empty($password) || empty($correo) || empty($deportes)) {
            $this->mensaje = 'Falta algún campo por rellenar.';
            $this->errorTipo = 'fallo';

            $datos['deportes'] = $this->objModelo->listarDeportes();
            $this->vista='Inscripcion';
            return $datos;
        }

        $contrasenia2 = $this->hashContrasenia($password);

        $resultado = $this->objModelo->insertarDatos($nombreUsuario, $nombreApellido, $contrasenia2, $correo, $telefono, $deportes );
        
        if($resultado === true)
            {
                $this->mensaje = 'Datos guardados correctamente.';
                $this->errorTipo = 'exito';
                $datos['deportes'] = $this->objModelo->listarDeportes();
                $this->vista='Inscripcion';
                return $datos;
            }else{

                $this->mensaje = 'Fallo en el guardado de datos.';
                $this->errorTipo = 'fallo';

                $datos['deportes'] = $this->objModelo->listarDeportes();
                $this->vista='Inscripcion';
                return $datos;
            }


    }

    public function hashContrasenia($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
}

?>