<?php

function konexioaEgin(){
$servername = "localhost:3306";
$username = "root";
$password = "1MG2024";
$dbname = "2erronka";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
return $conn;
}
?>
