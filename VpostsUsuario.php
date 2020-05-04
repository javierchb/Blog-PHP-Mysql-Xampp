<?php 
include 'includes/header.php';
include 'includes/navBarUsuario.php';

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
        <?php 
        $queryPost = "SELECT p.id, p.titulo, p.descripcion FROM post p, usuarios u, autores a WHERE p.id_autor = a.id AND a.id_usuario = u.id AND u.usuario = '$varUsuario'";
        $posts = mysqli_query($conn, $queryPost);
        while($post = mysqli_fetch_array($posts)){
        ?>
        <div class="col-md-4">
            <div class="card bg-light mb-3 my-1">
                <div class="card-header"> </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['titulo']; ?></h5>
                    <p class="card-text"><?php echo $post['descripcion']; ?></p>
                </div>
                <div class="card-header"> </div>
            </div>
            <a class="btn btn-outline-danger btn-block" href="VeditarPost.php?id=<?php echo $post['id'] ?>"> Editar </a>
        </div>
        <?php }?>
    </div>
</div>


<?php include 'includes/footer.php'; ?>