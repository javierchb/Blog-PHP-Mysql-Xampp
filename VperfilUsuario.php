<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'blogevaluacion';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
include 'includes/header.php';
include 'includes/navBarUsuario.php';
?>
<?php 
session_start();
$varUsuario = $_SESSION['usuario_enSesion'];
if($varUsuario == null || $varUsuario == ''){
    echo "No tienes autorización para esta vista.";
}
?>

<div class="container my-3">
    <div class="row justify-content-center my-2">
        <?php 
        $queryUsuario = "SELECT * FROM usuarios WHERE usuario = '$varUsuario'";
        $usuario = mysqli_query($conn, $queryUsuario);
        while($datos = mysqli_fetch_array($usuario)){
        ?>
        <div class="col-md-4">
            <h2 class="text-center"> <small>  Datos Personales </small></h3>
            <label> Nombre </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $datos['nombre']; ?>" readonly>
            <label> Apellido </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $datos['apellido']; ?>" readonly>
            <label> Nombre de Usuario </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $datos['usuario']; ?>" readonly>
            <label> Correo </label>
            <input class="form-control my-1" type="text" placeholder="<?php echo $datos['correo']; ?>" readonly>
            <h2 class="text-center"> <small> Información Posts </small></h2>
            <!-- <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModal">
                Editar
            </button> -->
            <!-- Modal
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1" action="editarUsuario.php" method="POST">
                                <input class="form-control my-1" type="text" name="nombre" value="<?php echo $datos['nombre']; ?>">
                                <input class="form-control my-1" type="text" name="apellido" value="<?php echo $datos['apellido']; ?>">
                                <input class="form-control my-1" type="text" name="usuario" value="<?php echo $datos['usuario']; ?>">
                                <input class="form-control my-1" type="text" name="correo" value="<?php echo $datos['correo']; ?>"> 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" value="Guardar Cambios" class="btn btn-outline-danger" name="actualizar_usuario">
                                </div>                        
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
        <?php }?>
        </div>  
    </div>
</div>



<?php include 'includes/footer.php'; ?>