<?php
include 'db.php';

if(isset($_POST['crear_comentario'])){
    $texto = $_POST['texto'];
    $insert = "INSERT INTO comentarios(texto) VALUE ('$texto')";
    $result = mysqli_query($conn,$result);

    if(!$result){
        echo "Ha fallado la consulta SQL.";
    }

    $_SESSION['message_created'] = "Se ha registrado tu comentario";
    header('location: Vcomentarios.php');
}




?>