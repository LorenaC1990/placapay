<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/routes/web.php';
$session = $_SESSION ? $_SESSION['auth'] : null;

if ($session) {
    require_once __DIR__ . '/templates/header.php';
}

$route = include __DIR__ . '/routes/web.php';

if ($route['controller']) {
    $controllerName = $route['controller'];
    require_once __DIR__ . "/controllers/$controllerName.php";

    $controller = new $controllerName();
    $method = $route['method'];
    $controller->$method();
} else {
    include __DIR__ . "/views/{$route['view']}.php";
}

if ($session) {
    require_once __DIR__ . '/templates/footer.php';
}
