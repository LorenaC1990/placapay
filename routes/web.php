<?php
$routes = [
    'home' => ['controller' => 'IngresoController', 'method' => 'index'],
    'ingreso' => ['controller' => null, 'view' => 'ingreso'],
    'agregaringreso' => ['controller' => 'IngresoController', 'method' => 'add_post'],
    'retiro' => ['controller' => 'IngresoController', 'method' => 'delete_post'],
    'reporte' => ['controller' => 'IngresoController', 'method' => 'get_report'],
    'login' => ['controller' => 'AdministradorController', 'method' => 'login'],
    'login_post' => ['controller' => 'AdministradorController', 'method' => 'login_post'],
    'editar_ingreso' => ['controller' => 'IngresoController', 'method' => 'editar_ingreso'],
    'post_editar_ingreso' => ['controller' => 'IngresoController', 'method' => 'post_editar_ingreso'],
    'eliminar_ingreso' => ['controller' => 'IngresoController', 'method' => 'eliminar_ingreso'],
    'logout' => ['controller' => 'IngresoController', 'method' => 'logout'],
];

$page = isset($_GET['page']) ? $_GET['page'] : 'login';



if (($page != "login" && $page != "login_post") && !isset($_SESSION['auth'])) {
    http_response_code(401);
    echo "<h1>401 - No autorizado</h1>";
    session_destroy();
    exit;
}

if (!array_key_exists($page, $routes)) {
    http_response_code(404);
    echo "<h1>404 - Página no encontrada</h1>";
    exit;
}

return $routes[$page];

// http://miweb/mirura?page=users
// $_GET => argumentos de la url, son los que llegan después del ?