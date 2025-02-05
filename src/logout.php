<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../views/hasiera.php"); // Cambia "index.php" por la URL a la que quieras redirigir
exit();
?>