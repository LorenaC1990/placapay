<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div id="login">
<img src="public\images\logo placapay.PNG" class="logo" alt="">
    <h2>Ingreso de Administrador</h2>
    
    <?php if (isset($_SESSION['error_login'])): ?>
    <p style="color: red;"><?php echo $_SESSION['error_login']; unset($_SESSION['error_login']); ?></p>
    <?php endif; ?>
    
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
    <div class="left">  </div>
    </div>

</div>
