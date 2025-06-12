<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlacaPay</title>
    <link rel="stylesheet" href="./src/styles.css">
    <link rel="stylesheet" href="./src/login.css">
</head>

<body>
    <div id="login">
        <img src="public\images\logo placapay.PNG" class="logo" alt="">
        <br>
        <br>

        <h2>Ingreso de Administrador</h2>

        <form action="?page=login_post" method="POST">
            <div class="field">
                <label for="usuario">Nombre de Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="field">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit">Iniciar sesión</button>
        </form>

        <div class="wraper">
            <div class="left"> </div>
        </div>
    </div>
</body>

</html>