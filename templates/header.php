<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlacaPay</title>
    <link rel="stylesheet" href="./src/styles.css">
    <link rel="stylesheet" href="./src/login.css">
</head>

<body>
    <main>
        <header>
            <h1>PlacaPay</h1>
            <nav>
                <a href="index.php?page=home" class="<?php echo $_GET['page'] == 'home' ? 'nav--current' : '' ?>">Inicio</a>
                <a href="index.php?page=ingreso" class="<?php echo $_GET['page'] == 'ingreso' ? 'nav--current' : '' ?>">Ingreso</a>
                <a href="index.php?page=reporte" class="<?php echo $_GET['page'] == 'reporte' ? 'nav--current' : '' ?>">Reporte</a>
                <a href="index.php?page=logout">Salir</a>
            </nav>
        </header>