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
        $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';
        $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
        $deportes = []; 

        if (!empty($_POST['deporte'])) {
            foreach ($_POST['deporte'] as $d) {
                $deportes[] = trim($d); // agregamos cada valor limpio
            }
        }

        if (empty($usuario) || empty($nombre) || empty($password) || empty($correo) || empty($deportes)) {
            $this->mensaje = 'Falta algún campo por rellenar.';
            $this->errorTipo = 'fallo';
            $this->inscripcion();
            return false;
        }

        // Aquí podrías guardar en la base de datos con $this->objModelo
        $this->mensaje = 'Datos guardados correctamente.';
        $this->errorTipo = 'exito';
        return true;
    }
    
}

?>