<?php

session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'blogevaluacion';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// if($conn){
//     echo "Conexión con base de datos establecida.";
// } else {
//     echo "No se ha podido conectar a la base datos.";
// }

?>