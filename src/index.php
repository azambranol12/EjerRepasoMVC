<?php
require_once 'config/config.php';

if(!isset($_GET['c'])){
    $_GET['c'] = ControladorDefecto;
}

if(!isset($_GET['m'])){
    $_GET['m'] = MetodoDefecto;
}

$rutaControlador = RutaControlador . $_GET['c'] . '.php';
require_once $rutaControlador;

$controlador = 'C' . $_GET['c'];
$objControlador = new $controlador();

$datos = []; 

if (method_exists($objControlador, $_GET['m'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $datos = $objControlador->{$_GET['m']}($_POST);
    } 
    else {
        $datos = $objControlador->{$_GET['m']}();
    }

}

if ($objControlador->vista != '') {
    if (is_array($datos))
        extract($datos);
    require_once RutaVista . $objControlador->vista . '.php';
}

?>