<?php
require_once __DIR__ . '/../models/Ingreso.php';

class IngresoController
{
    private $ingresoModel;

    public function __construct()
    {
        $this->ingresoModel = new Ingreso();
    }

    private function verificarLogin()
    {
           if (session_status() === PHP_SESSION_NONE) {
            session_start();
           }
        if (!isset($_SESSION['usuario_logueado'])) {
            header("Location: ?page=login");
            exit;
        }
    }

    public function index()
    {
        $this->verificarLogin(); // Protección
        $ingresos = $this->ingresoModel->traerIngresos();
        include __DIR__ . '/../views/home.php';
    }

    public function add_post()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        if (!isset($_POST['placa']) || !isset($_POST['tarifa'])) {
            echo "Error: Faltan datos en el formulario.";
            exit;
        }

        $this->ingresoModel->postIngreso($_POST);
        include __DIR__ . '/../views/exito.php';
    } else {
        echo "Acceso no permitido";
        exit;
    }
}

    // Marcar salida
    public function delete_post()
    {
        $this->verificarLogin(); // Protección

        if (!isset($_GET['id'])) {
            echo "ID no proporcionado para marcar salida.";
            return;
        }

        $id = $_GET['id'];
        $respuesta = $this->ingresoModel->checkoutIngreso($id);
        echo $respuesta;
        return;
    }

    // Eliminar ingreso sin registrar salida
    public function eliminar_post()
    {
        $this->verificarLogin(); // Protección

        if (!isset($_GET['id'])) {
            echo "ID no proporcionado para eliminar.";
            return;
        }

        $id = $_GET['id'];
        $respuesta = $this->ingresoModel->eliminarIngreso($id);
        echo $respuesta;
        return;
    }

    public function get_report()
    {
        $this->verificarLogin(); // Protección
        $ingresos = $this->ingresoModel->traerIngresos(true);
        include __DIR__ . '/../views/reporte.php';
    }

    public function editar_ingresos()
    {
        $this->verificarLogin(); // Protección

        if (!isset($_GET['id'])) {
            echo "ID no proporcionado.";
            return;
        }

        $id = $_GET['id'];
        $ingreso = $this->ingresoModel->getIngresoPorId($id);
        
        if (!$ingreso) {
            echo "Ingreso no encontrado.";
            return;
        }

        include __DIR__ . '/../views/editar_ingreso.php';
    }

    public function post_editar_ingreso()
    {
        $this->verificarLogin(); // Protección
        $this->ingresoModel->editarIngreso($_POST);
        include __DIR__ . '/../views/exito.php';
    }
}
