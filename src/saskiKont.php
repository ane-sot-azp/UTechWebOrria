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

$sql = "SELECT SUM(kopurua) AS kontadorea FROM saskia WHERE Bezeroa_idBezeroa = $id GROUP BY Bezeroa_idBezeroa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['kontadorea'];
    }
} else {
    echo "0";
}
}

$conn->close();
?>