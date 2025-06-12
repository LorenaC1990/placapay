<?php
require_once __DIR__ . '/../models/Ingreso.php';

class IngresoController
{
    private $ingresoModel;

    public function __construct()
    {
        $this->ingresoModel = new User();
    }

    public function index()
    {
        $ingresos = $this->ingresoModel->traerIngresos();
        include __DIR__ . '/../views/home.php';
    }

    public function add_post()
    {
        $this->ingresoModel->postIngreso($_POST);
        include __DIR__ . '/../views/exito.php';
    }

    public function delete_post()
    {
        $respuesta = $this->ingresoModel->checkoutIngreso($_GET['id']);
        echo $respuesta;
        return;
    }

    public function get_report()
    {
        $ingresos = $this->ingresoModel->traerIngresos(true);
        include __DIR__ . '/../views/reporte.php';
    }

    public function editar_ingreso()
    {
        $ingreso = $this->ingresoModel->traerIngreso($_GET['id']);
        include __DIR__ . '/../views/editar_ingreso.php';
    }

    public function post_editar_ingreso()
    {
        $respuesta =  $this->ingresoModel->actualizar_ingreso($_POST);
        echo $respuesta;
    }

    public function eliminar_ingreso() {
        $respuesta =  $this->ingresoModel->eliminar_ingreso($_GET['id']);
        echo $respuesta;
    }

    public function logout() {
        session_destroy();
        header('Location: ?page=login');
    }
}
