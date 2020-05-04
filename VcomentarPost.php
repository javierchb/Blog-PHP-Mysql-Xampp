<?php
include 'includes/header.php';
include 'includes/navbarUsuario.php';
?>
<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'blogevaluacion';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$idPost = $_GET['id'];
?>
<?php 
session_start();
$varUsuario = $_SESSION['usuario_enSesion'];
if($varUsuario == null || $varUsuario == ''){
    echo "No tienes autorización para esta vista.";
}
?>
<?php 
if(isset($_POST['crear_comentario'])){
    $comentario = $_POST['comentario'];
    $insertQuery = "INSERT INTO comentario (id_post, id_autor, texto) VALUES ($idPost, (SELECT a.id FROM usuarios u, autores a WHERE a.id_usuario = u.id AND u.usuario = '$varUsuario'), '$comentario')";
    $result = mysqli_query($conn, $insertQuery);
    if(!$result){
        echo "Ha fallado la consulta para agregar comentario";
    }

    header('location: VpostUsuariosSesion.php');

}
?>

<div class="container my-3">
    <div class="row justify-content-center my-2">
        <?php 
        $queryPost = "SELECT * FROM post WHERE id = $idPost";
        $post = mysqli_query($conn, $queryPost);
        while($datos = mysqli_fetch_array($post)){
        ?>
        <div class="col-md-6">
            <div class="card bg-light mb-3 my-1">
                <div class="card-header"> </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $datos['titulo']; ?></h5>
                    <p class="card-text"><?php echo $datos['descripcion']; ?></p>
                </div>
                <div class="card-header"> </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="row justify-content-center my-2">
        <?php
        $queryComentarios = "SELECT c.texto, c.fecha, u.usuario FROM comentario c, post p, autores a, usuarios u WHERE c.id_post = p.id AND c.id_autor = a.id AND u.id = a.id_usuario AND c.id_post = $idPost ORDER BY c.fecha";
        $comentarios = mysqli_query($conn,$queryComentarios);
        while($comentario = mysqli_fetch_array($comentarios)){
        ?>
        <div class="col-md-7">
        <div class="card bg-white mb-3 my-1">
            <div class="card-header"><?php echo $comentario['usuario'] ?></div>
            <div class="card-body">
                <p class="card-text"><?php echo $comentario['texto']; ?></p>
            </div>
            <div class="card-header"><?php echo $comentario['fecha'] ?></div>
        </div>
        </div>
        <?php } ?>
        <div class="col-md-7">
            <form method="POST">
                <textarea class="form-control my-1" name="comentario" rows="4"></textarea>
                <input class="btn btn-outline-success btn-block my-2" type="submit" name="crear_comentario" value="Agregar Comentario">
            </form>
        </div>
    </div>
</div>


<?php 
include 'includes/footer.php';
?>