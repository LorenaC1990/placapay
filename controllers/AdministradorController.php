<?php
require_once __DIR__ . '/../models/ingresoaministrador.php';

class AdministradorController
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new Admin();
    }

// Mostrar el formulario de login (GET)
    public function login() {
        session_start();

        if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario'] === true) {
            header("Location: ?page=home");
            exit;
        }

        include __DIR__ . '/../views/login.php';
}


    // Manejar el inicio de sesión (POST)
    public function login_post() {
    session_start(); // Solo una vez al inicio

    if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $auth = $this->adminModel->login($usuario, $contrasena);

        if ($auth) {
            $_SESSION['usuario_logueado'] = true; 
            $_SESSION['usuario'] = $usuario;
            header('Location: ?page=home');
            exit;
        } else {
            $_SESSION['error_login'] = "Usuario o contraseña incorrectos.";
            header('Location: ?page=login');
            exit;
        }
    } else {
        $_SESSION['error_login'] = "Faltan los datos de usuario o contraseña.";
        header('Location: ?page=login');
        exit;
    }
}

// Cerrar sesión
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: ?page=login");
        exit;
    }
}
