<?php


class CInicio{

    public $vista;
    public $objModelo;

    public function __construct()
    {
        $this->vista = '';
    }

    public function iniciarSesion()
    {
        $this->vista='Iniciar';
    }

    public function inscripcion()
    {
        $this->vista='Inscripcion';
    }

    public function inicio()
    {
        $this->vista='Inicio';
    }
}

?>