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
        include __DIR__ . '/../views/login.php';  // Muestra el formulario de login
    }

    // Manejar el inicio de sesión (POST)
    public function login_post() {
        if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
    
            // Llamar a la función de autenticación
            $auth = $this->adminModel->login($usuario, $contrasena);
            if ($auth)  {
                $_SESSION['auth'] = 'pruebas';
                header('Location: ?page=home');
            } else {
                echo "Usuario no existe."; 
            }
        } else {
            echo "Faltan los datos de usuario o contraseña.";
        }
    }
}

