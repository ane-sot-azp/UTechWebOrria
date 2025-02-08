<?php
session_start();

unset($_SESSION["username"]);
unset($_SESSION["izena"]);
unset($_SESSION["id"]);
unset($_SESSION["pasahitza"]);

header("Location: ../views/hasiera.php");
exit();
?>