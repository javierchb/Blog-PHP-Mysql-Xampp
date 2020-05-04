<?php
include 'db.php';

mysqli_select_db($conn,'usuarios');
$nombreU = $_POST['nombreUsuario'];
$query = "SELECT * FROM usuarios WHERE usuario = '$nombreU'";
$result = mysqli_query($conn, $query);
$find = mysqli_num_rows($result);
if(!$result){
    echo 'Error query.';
}
if($find == 1){
    $_SESSION['message_user'] = 'Usuario existente. Intente con otro Nombre.';
    header('location: Vregistro.php');
}else if(isset($_POST['agregar_usuario'])){

    $nombreUsuario = $_POST['nombreUsuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contrasena = $_POST['contrasena1'];
    $correo = $_POST['correo'];

    $insert = "INSERT INTO usuarios (nombre,apellido,usuario,contraseña,correo) VALUES ('$nombre','$apellido','$nombreUsuario','$contrasena','$correo')";
    $resultIns = mysqli_query($conn, $insert);
    if(!$resultIns){
        die("Ha fallado la consulta.");
    }

    #Crear Autor
    $buscarUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
    $usuario = mysqli_query($conn, $buscarUsuario);
    while($datos = mysqli_fetch_array($usuario)){
        $idusuario = $datos['id'];
        $queryAutor = "INSERT INTO autores (id_usuario) VALUES ($idusuario)";
        $resultAutor = mysqli_query($conn, $queryAutor);
        if(!$resultAutor){
            echo "Error al intentar agregar a la tabla autores.";
        }
    }

    $_SESSION['message'] = 'Usuario Registrado con éxito.';
    $_SESSION['message_type'] = 'success';
    header('location: Vregistro.php');
    
}



?>