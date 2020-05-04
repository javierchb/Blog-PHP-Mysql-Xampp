<?php
include 'db.php';

if(isset($_POST['actualizar_usuario'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];

    $queryUpdate = "UPDATE usuarios SET "
}

?>
