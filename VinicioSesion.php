<?php session_start();?>
<?php
include 'includes/header.php';
include 'includes/navbar.php'; 
?>

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-5 my-2">
            <h3 class="text-center"> Inicio de Sesión </h3>
            <form method="POST" action="iniciarSesion.php" name="iniciarSesion">
                <input class="form-control my-1" type="text" name="nombreUsuario" placeholder="Nombre de Usuario" required>
                <input class="form-control my-1" type="password" name="contrasena" placeholder="Contraseña" required>
                <input class="btn btn-outline-danger btn-block" type="submit" value="Iniciar Sesión" name="iniciar_sesion">
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php';?>