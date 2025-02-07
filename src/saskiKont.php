<?php
session_start();
require_once("../src/db.php");
$conn = konexioaEgin();

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if (!isset($_SESSION['id'])) {
    echo'0';}else{
$id = $_SESSION['id'];
// Consultar los productos
$sql = "SELECT COUNT(idSaskia) AS kontadorea FROM saskia WHERE Bezeroa_idBezeroa = $id GROUP BY Bezeroa_idBezeroa";
$result = $conn->query($sql);

// Mostrar los productos
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['kontadorea'];
    }
} else {
    echo "No hay productos disponibles.";
}
}

$conn->close();
?>