<?php

    require_once __DIR__ . '/../modelo/mInicio.php';

class CInicio{

    public $vista;
    public $objModelo;
    public $errorTipo;
    public $mensaje;

    public function __construct()
    {
        $this->vista = '';
        $this->objModelo = new MInicio();
    }

    public function inicio()
    {
        $this->vista='Inicio';
    }


    public function iniciarSesion()
    {
       $nombreUsuario = isset($_POST['usuario'])? trim($_POST['usuario']) : '';
       $pw = isset($_POST['password'])? trim($_POST['password']) : '';

       if(empty($nombreUsuario) || empty($pw)){
            $this->mensaje = 'Falta algún campo por rellenar.';
            $this->errorTipo = 'fallo';
            $this->vista= 'Inicio';
            return;
       }

       $resultado = $this->objModelo->inciarSesion($nombreUsuario, $pw);

       if($resultado)
        {
            $this->mensaje = 'Inicio de sesion correcto';
            $this->errorTipo = 'exito';
            $this->vista= 'Inicio';
            return;
        }else{
            $this->mensaje = 'Inicio de sesion fallado o usuario o contraseña mal';
            $this->errorTipo = 'fallo';
            $this->vista= 'Inicio';
            return;
        }
    }
}

?>