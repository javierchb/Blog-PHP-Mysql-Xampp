<?php include 'db.php' ?>
<?php include 'includes/header.php';  ?>
<?php include 'includes/navbar.php'; ?>


    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-md-5 my-2">
                <h3 class="text-center"> Registro de Usuarios </h3>

                <form action="agregarUsuario.php" method="POST">
                    <div class="form-row my-2">
                        <div class="col my-1">
                            <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="col my-1">
                            <input class="form-control" type="text" name="apellido" placeholder="Apellido" required>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col my-1">
                            <input class="form-control" type="text" name="nombreUsuario" placeholder="Nombre de Usuario" required>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col my-1">
                            <input class="form-control" type="email" name="correo" placeholder="Correo" required>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col">
                            <input class="form-control" type="password" name="contrasena1" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <input class="btn btn-outline-danger btn-block" type="submit" value="Registrar" name="agregar_usuario">
                </form>
                <?php if(isset($_SESSION['message'])){ ?>
                    <div class="alert alert-<?php echo $_SESSION['message_type'] ?> alert-dismissible fade show my-2" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset();} else if(isset($_SESSION['message_user'])){?>
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        <?= $_SESSION['message_user'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset();} ?>
            </div>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>