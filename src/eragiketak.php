<?php

require_once("../src/db.php");

if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "loginaEgin") {
    $conn = konexioaEgin();
    $erabiltzailea = $conn->real_escape_string($_POST["erabiltzailea"]);
    $pasahitza = $conn->real_escape_string($_POST["pasahitza"]);
    if ($pasahitza === '' or $erabiltzailea === '') {
        $conn->close();
        echo "falta";
        die;
    } else {
        $sql = "SELECT * FROM bezeroa WHERE postaElektronikoa='$erabiltzailea' AND pasahitza= BINARY '$pasahitza'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $conn->close();
            echo "ongi";
            die;
        } else {
            $conn->close();
            echo "error";
            die;
        }
    }
} else if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "erregistroaEgin") {
    $conn = konexioaEgin();
    $izena = $conn->real_escape_string($_POST["izena"]);
    $abizena = $conn->real_escape_string($_POST["abizena"]);
    $nan = $conn->real_escape_string($_POST["nan"]);
    $postaElektronikoa = $conn->real_escape_string($_POST["postaElektronikoa"]);
    $telefonoZenbakia = $conn->real_escape_string($_POST["telefonoZenbakia"]);
    $helbidea = $conn->real_escape_string($_POST["helbidea"]);
    $herria = $conn->real_escape_string($_POST["herria"]);
    $postaKodea = $conn->real_escape_string($_POST["postaKodea"]);
    $pasahitza2 = $conn->real_escape_string($_POST["pasahitza2"]);
    if ($izena === '' or $abizena === '' or $nan === '' or $postaElektronikoa === '' or $telefonoZenbakia === '' or $pasahitza2 === '') {
        $conn->close();
        echo "falta";
        die;
    } else {
        $sql1 ="SELECT * FROM bezeroa WHERE postaElektronikoa='$postaElektronikoa'";
        $result1=$conn->query($sql1);
        if ($result1->num_rows > 0) {
            $conn->close();
            echo "repe";
            die;
        } else {
        $sql = "INSERT INTO bezeroa (nanEdoNif, izena, abizena, telefonoZenbakia, postaElektronikoa, helbidea, herria, postaKodea, pasahitza)VALUES(
         '$nan', '$izena', '$abizena', '$telefonoZenbakia', '$postaElektronikoa', '$helbidea', '$herria', '$postaKodea', '$pasahitza2')";
        $result = $conn->query($sql);

        if ($result==true) {
            $conn->close();
            echo "ongi";
            die;
        } else {
            $conn->close();
            echo "error";
            die;
        }
    }
}
}
?>