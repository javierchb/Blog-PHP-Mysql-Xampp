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
<?php 
# Editar Post
$idPost = $_GET['id'];
if(isset($_POST['editar_post'])){
    $titulo = $_POST['titulo'];
    $post = $_POST['post'];

    $updateQuery = "UPDATE post SET titulo = '$titulo', descripcion = '$post' WHERE id = $idPost";
    $result = mysqli_query($conn, $updateQuery);
    if(!$result){
        echo "Ha fallado la consulta";
    }

    header('location: Vusuario.php');
}
?>
<div class="container my-3">
    <div class="row justify-content-center my-2">
        <div class="col-md-3">
            <a class="btn btn-outline-dark btn-block" href="VpostsUsuario.php"> ¡Ir a mis Posts! </a>
            <a class="btn btn-outline-dark btn-block" href="#"> ¡Ver todos los Posts! </a>
            <a class="btn btn-outline-dark btn-block" href="Vusuario.php"> ¡Ir al Menú! </a>
        </div>
        <div class="col-md-6">
        <?php 
        $queryPost = "SELECT * FROM post WHERE id = $idPost";
        $post = mysqli_query($conn, $queryPost);
        while($datos = mysqli_fetch_array($post)){
        ?>
            <form method="POST">
                <input class ="form-control my-1" type="text" name="titulo" value="<?php echo $datos['titulo'] ?>">
                <textarea class="form-control my-1" rows="6" name="post"><?php echo $datos['descripcion'] ?></textarea>
                <input class="btn btn-outline-success btn-block my-1" type="submit" name="editar_post" value="Realizar Cambios">
            </form>
        <?php }?> 
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>