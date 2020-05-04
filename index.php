<?php 
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container my-3">
    <!-- MOSTRAR POSTS -->
    <div class="row justify-content-center my-2">
        <?php 
        $queryShowPost = "SELECT * FROM post p, autores a, usuarios u WHERE a.id_usuario = u.id AND p.id_autor = a.id";
        $posts = mysqli_query($conn,$queryShowPost);
        while($post = mysqli_fetch_array($posts)){ ?>
        <div class="col-md-4">
            <div class="card bg-white mb-3 my-1">
                <div class="card-header"> <?php echo $post['nombre']." ".$post['apellido']." [Autor@]" ?> </div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $post['titulo'];  ?></h5>
                    <p class="card-text"> <?php echo $post['descripcion'] ?> </p>
                </div>
                <div class="card-header"> <?php echo $post['fecha']; ?> </div>
            </div>
        </div>
        <!-- Link Comentarios -->
        <?php } ?>
    </div>
</div>












<?php
include 'includes/footer.php';
?>