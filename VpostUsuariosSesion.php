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
        <?php 
        $queryPosts = "SELECT p.id, p.titulo, p.descripcion, p.fecha ,u.nombre, u.apellido FROM post p, usuarios u, autores a WHERE p.id_autor = a.id AND a.id_usuario = u.id";
        $posts = mysqli_query($conn,$queryPosts);
        while($post = mysqli_fetch_array($posts)){
        ?>
        <div class="col-md-4">
            <div class="card bg-white mb-3 my-1">
                <div class="card-header"> Autor@ - <?php echo $post['nombre']." ".$post['apellido'] ?></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['titulo']; ?></h5>
                    <p class="card-text"><?php echo $post['descripcion']; ?></p>
                </div>
                <div class="card-header"><?php echo $post['fecha'] ?></div>
            </div>
            <a class="btn btn-outline-danger btn-block" href="VcomentarPost.php?id=<?php echo $post['id'] ?>"> Comentar </a>
        </div>
        <?php } ?>
    </div>
</div>





<?php 
include 'includes/footer.php';
?>