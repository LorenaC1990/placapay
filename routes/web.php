<?php
$routes = [
    'home' => ['controller' => 'IngresoController', 'method' => 'index'],
    'ingreso' => ['controller' => 'IngresoController', 'method' => 'index'],
    'agregaringreso' => ['controller' => 'IngresoController', 'method' => 'add_post'],
    'retiro' => ['controller' => 'IngresoController', 'method' => 'delete_post'],
    'eliminar_ingreso' => ['controller' => 'IngresoController', 'method' => 'eliminar_post'],
    'reporte' => ['controller' => 'IngresoController', 'method' => 'get_report'],
    'login' => ['controller' => 'AdministradorController', 'method' => 'login'],
    'login_post' => ['controller' => 'AdministradorController', 'method' => 'login_post'],
    'logout' => ['controller' => 'AdministradorController', 'method' => 'logout'],
    'editar_ingreso'=> ['controller' => 'IngresoController', 'method' => 'editar_ingresos'],
    'post_editar_ingreso'=> ['controller' => 'IngresoController', 'method' => 'post_editar_ingreso'], 
];

$page = isset($_GET['page']) ? $_GET['page'] : 'login';

if (!array_key_exists($page, $routes)) {
    http_response_code(404);
    echo "<h1>404 - Página no encontrada</h1>";
    exit;
}

return $routes[$page];

// http://miweb/mirura?page=users
// $_GET => argumentos de la url, son los que llegan después del ?