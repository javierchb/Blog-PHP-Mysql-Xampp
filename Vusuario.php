<?php 
include 'includes/header.php';
include 'includes/navbarUsuario.php';

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'blogevaluacion';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
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
        <div class="col-md-3">
            <button class="btn btn-outline-dark btn-block"> 
               ¡Hola <?php echo $varUsuario; ?> !
            </button>
            <h2 class="text-center">
                <small> ¿Qué desear hacer? </small>
            </h2>
            <?php 
                $query = "SELECT * FROM usuarios WHERE usuario = '$varUsuario'";
                $usuario = mysqli_query($conn,$query);
                while($dato = mysqli_fetch_array($usuario)){

            ?>
            <a class="btn btn-outline-danger btn-block" href="VcrearPost.php?id=<?php echo $dato['id'] ?>"> ¡Crear Post! </a>
                <?php }?>
            <a class="btn btn-outline-danger btn-block" href="VpostsUsuario.php"> ¡Ir a tus Posts! </a> 
        </div>
    </div>
</div>


<?php  include 'includes/footer.php';?>