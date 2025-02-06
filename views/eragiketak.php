<?php
session_start();
require_once("../src/db.php");

if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "loginaEgin") {
    $conn = konexioaEgin();
    if (!$conn) {
        echo "dberror";
    }
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
            while ($row = $result->fetch_assoc()) {
                $_SESSION["username"] = $erabiltzailea;
                $_SESSION["izena"] = $row["izena"];
                $_SESSION["id"] = $row["idBezeroa"];
                $_SESSION["pasahitza"] = $row["pasahitza"];
            }
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
        $sql1 = "SELECT * FROM bezeroa WHERE postaElektronikoa='$postaElektronikoa'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            $conn->close();
            echo "repe";
            die;
        } else {
            $sql = "INSERT INTO bezeroa (nanEdoNif, izena, abizena, telefonoZenbakia, postaElektronikoa, helbidea, herria, postaKodea, pasahitza)VALUES(
         '$nan', '$izena', '$abizena', '$telefonoZenbakia', '$postaElektronikoa', '$helbidea', '$herria', '$postaKodea', '$pasahitza2')";
            $result = $conn->query($sql);

            if ($result == true) {
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
} else if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "bezeroaEguneratu") {
    $conn = konexioaEgin();
    $izena = $conn->real_escape_string($_POST["izena"]);
    $abizena = $conn->real_escape_string($_POST["abizena"]);
    $nan = $conn->real_escape_string($_POST["nan"]);
    $postaElektronikoa = $conn->real_escape_string($_POST["postaElektronikoa"]);
    $telefonoZenbakia = $conn->real_escape_string($_POST["telefonoZenbakia"]);
    $helbidea = $conn->real_escape_string($_POST["helbidea"]);
    $herria = $conn->real_escape_string($_POST["herria"]);
    $postaKodea = $conn->real_escape_string($_POST["postaKodea"]);
    $id = $_SESSION['id'];
    if ($izena === '' or $abizena === '' or $nan === '' or $postaElektronikoa === '' or $telefonoZenbakia === '') {
        $conn->close();
        echo "falta";
        die;
    } else {
        $sql = "UPDATE bezeroa SET izena='$izena', abizena='$abizena', nanEdoNif='$nan', postaElektronikoa='$postaElektronikoa', telefonoZenbakia='$telefonoZenbakia', helbidea='$helbidea', herria='$herria', postaKodea='$postaKodea' WHERE idBezeroa='$id'";
        $result = $conn->query($sql);
        if ($result == true) {
            $conn->close();
            echo "ongi";
            die;
        } else {
            $conn->close();
            echo "error";
            die;
        }
    }
} else if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "pasahitzaEguneratu") {
    $conn = konexioaEgin();
    $pasahitzaold = $conn->real_escape_string($_POST["pasahitzaold"]);
    $sessionPasahitza = $conn->real_escape_string($_POST["sessionPasahitza"]);
    $pasahitza1 = $conn->real_escape_string($_POST["pasahitza1"]);
    $pasahitza2 = $conn->real_escape_string($_POST["pasahitza2"]);
    $id = $_SESSION['id'];
    if ($pasahitzaold != $sessionPasahitza) {
        $conn->close();
        echo "pasahitza";
        die;
    } else {
        if ($pasahitza1 != $pasahitza2) {
            $conn->close();
            echo "falta";
            die;
        } else {
            $sql = "UPDATE bezeroa SET pasahitza='$pasahitza1'WHERE idBezeroa='$id'";
            $result = $conn->query($sql);
            $_SESSION["pasahitza"] = $pasahitza1;
            if ($result == true) {
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
} else if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "produktuBerria") {
    $conn = konexioaEgin();
    $mota = $conn->real_escape_string($_POST["mota"]);
    $marka = $conn->real_escape_string($_POST["marka"]);
    $modeloa = $conn->real_escape_string($_POST["modeloa"]);
    $ezaugarriak = $conn->real_escape_string($_POST["ezaugarriak"]);
    $egoera = $conn->real_escape_string($_POST["egoera"]);
    $id = $_SESSION['id'];
    if ($marka === '' or $mota === '' or $modeloa === '' or $ezaugarriak === '' or $egoera === '') {
        $conn->close();
        echo "falta";
        die;
    } else {
        $sql = "INSERT INTO prodprest (ProduktuMota_idProduktuMota, Bezeroa_idBezeroa, marka, modeloa, ezaugarriak, egoera)
        VALUES ($mota, $id, '$marka', '$modeloa', '$ezaugarriak', $egoera)";
        $result = $conn->query($sql);
        if ($result == true) {
            $conn->close();
            echo "ongi";
            die;
        } else {
            $conn->close();
            echo "error";
            die;
        }
    }
} else if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "saskira") {
    $conn = konexioaEgin();
    $idProduktua = $_POST['produktuaId'];
    $idBezeroa = $_SESSION['id'];
    $sql1 = '';

    $sql = "INSERT INTO saskia (Bezeroa_idBezeroa, Produktua_idProduktua, kopurua, prezioa, egoera, data)
        VALUES ($idBezeroa, $idProduktua, 1, (SELECT salmentaPrezioa FROM produktua WHERE idProduktua = $idProduktua), 'saskian', NOW())";

    $result = $conn->query($sql);
    if ($result == true) {
        echo 'ongi';
    } else {
        echo 'error';
    }
    $conn->close();
} else if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "saskitikAtera") {
    $conn = konexioaEgin();
    $idSaskia = $_POST['saskiaId'];

    $sql = "DELETE FROM saskia WHERE idSaskia = $idSaskia";

    $result = $conn->query($sql);
    if ($result == true) {
        echo 'ongi';
    } else {
        echo 'error';
    }
    $conn->close();
} 
else if (isset($_POST["akzioa"]) && $_POST["akzioa"] == "erosi") {
    $conn = konexioaEgin();
    if (!$conn) {
        echo 'dberror';
        exit;
    }
    $id = $_SESSION['id'];
    $sql1 = "SELECT Produktua_idProduktua FROM saskia WHERE Bezeroa_idBezeroa = $id";
    $sql2 = "UPDATE saskia SET egoera = 'erosita' WHERE Bezeroa_idBezeroa = $id";
    $sql = "DELETE FROM saskia WHERE Bezeroa_idBezeroa = $id";

    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $produktua_id = $row['Produktua_idProduktua'];

            // Actualizar el stock del producto
            $sql3 = "UPDATE produktua SET stock = stock - 1 WHERE idProduktua = $produktua_id";
            $conn->query($sql1);
        }}

    $result2 = $conn->query($sql2);
    $result = $conn->query($sql);
    if ($result == true && $result1 == true && $result2 == true) {
        echo 'ongi';
    } else {
        echo 'error';
    }
    $conn->close();
    exit();
}

?>