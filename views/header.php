<?php
// session_start();
require_once("eragiketak.php");
if (isset($_SESSION['izena'])) {
    $first_letter = substr($_SESSION['izena'], 0, 1);
}
if (isset($_POST['selectedLang'])) {
    $_SESSION['_LANGUAGE'] = $_POST['selectedLang'];
}


?>

<!DOCTYPE html>
<html lang="eus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/header.css">
    </linkrel>
</head>

<body>
    <header>
        <?php
        require_once("../src/translations.php"); //APP_DIR erabilita itzulpenen dokumentua atzitu dugu.
        ?>
        <div class="sticky">
            <div class="navbar">
                <div class="header">
                    <a class="logoa" href="hasiera.php"><img class="logo" src="../public/irudiak/IKONOAK/LOGO.svg"
                            alt="Logoa" class="center"></a>
                </div>
                <button class="openbtnNav" onclick="menuaIreki()">☰</button>
                <div class="menua">
                    <div class="bilatu">
                        <a class="bilatu">
                            <form action="buscar.php" method="GET">
                                <input type="search" name="query" placeholder="<?= trans("bilatu...") ?>...">
                            </form>
                        </a>
                    </div>
                    <div id="left">
                        <a class="left" href="hasiera.php"><?= trans("index") ?></a>
                        <a class="left" href="norGara.php"><?= trans("about") ?></a>
                        <a class="left" href="katalogoa.php"><?= trans("catalogue") ?></a>
                        <a class="left" href="kontaktua.php"><?= trans("contact") ?></a>
                    </div>
                    <div id="right">
                        <div class="right"><a class="right" href="#saskia"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                        <div class="right">
                            <?php
                            if (isset($_SESSION["username"]) && $_SESSION["username"] != "") {
                                echo '<a class="right" href="erabiltzailea.php"><div class="erabiltzailea">' . $first_letter . '</div></a>';
                            } else if (!isset($_SESSION["username"])) {
                                echo '<a class="right" href="login.php"><i class="fa-solid fa-user"></i></a>';
                            }
                            ?>
                        </div>
                        <div class="hizkuntza right">
                            <?php
                            $currentLang = isset($_SESSION['_LANGUAGE']) ? $_SESSION['_LANGUAGE'] : 'en';

                            // Muestra la bandera opuesta
                            if ($currentLang == 'en') {
                                echo '<form method="post">
                            <input type="hidden" name="selectedLang" value="eus">
                            <button class="right" type="submit" style="border:none; background:none;">
                                <img src="../public/irudiak/IKONOAK/ikurriña.png" alt="Euskara" style="width:40px;">
                            </button>
                            </form>';
                            } else {
                                echo '<form method="post">
                            <input type="hidden" name="selectedLang" value="en">
                            <button class="right" type="submit" style="border:none; background:none;">
                                <img src="../public/irudiak/IKONOAK/uk.png" alt="Ingelesa" style="width:40px;">
                            </button>
                        </form>';
                            }
                            ?>


                        </div>

                        <!-- <a class="hizkuntza hiz right" href="hasiera_EN.php"><img
                                src="../public/irudiak/IKONOAK/uk.png"></a> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="saskia" class="lehioa">
            <div class="lehioa-contenido">
                <a href="#" class="itxi">&times;</a>
                <h2 class=""><?= trans("cart") ?></h2>
                <?php
                $conn = konexioaEgin();
                if (!$conn) {
                    echo "dberror";
                }
                if(isset($_SESSION["username"]) && $_SESSION["username"] != ""){
                    $id = $_SESSION['id'];
                $sql = "SELECT * FROM saskia WHERE Bezeroa_idBezeroa=$id ORDER BY data DESC";
                $result = $conn->query($sql);
                $orders = [];

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $orders[] = $row;
                    }
                }

                if (!empty($orders)) {
                    echo '<div id="eskaera' . $orders[0]["idSaskia"] . '" class="eskaera"> ';
                    echo '<table width="100%">';
                    echo '<thead>';
                    echo '<th></th>';
                    echo '<th>Marka</th>';
                    echo '<th>Modeloa</th>';
                    echo '<th>Kopurua</th>';
                    echo '<th>Prezioa</th>';
                    echo '<th></th>';
                    echo '</tr></thead><tbody>';

                    foreach ($orders as $order) {
                        $sql1 = "SELECT p.marka, p.modeloa, p.irudia1, s.kopurua, s.prezioa FROM produktua p JOIN saskia s ON p.idProduktua=" . $order["Produktua_idProduktua"];
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            $product = $result1->fetch_assoc();
                            echo '<tr>';
                            echo '<td><a href="produktua.php?produktuid=' . $order["Produktua_idProduktua"] . '"><img src="../public/irudiak/PRODUKTUAK' . $product["irudia1"] . '" alt="produktua" width="100px" height="100px"></a></td>';
                            echo '<td>' . $product["marka"] . '</td>';
                            echo '<td>' . $product["modeloa"] . '</td>';
                            echo '<td>' . $order["kopurua"] . '</td>';
                            echo '<td>' . $order["prezioa"] . ' €</td>';
                            echo '<td><a class="right" onclick="saskitikAtera(' . $order["idSaskia"] . ')"><i class="fa-regular fa-trash-can"></i></a></td>';
                            echo '</tr>';
                        }
                    }
                    echo '</tbody></table>';
                    echo '<button class="erabBtn" onclick="erosi()" type="button">Erosi!</button>';
                    echo '</div>';
                } else {
                    echo '<h5>trans("emptyCart")</h5>';
                }
                }else{
                    echo '<h5>trans("noUser")</h5>';}
                 ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            function erosi() {
                $.ajax({
                    url: "eragiketak.php",
                    method: "POST",
                    data: {
                        akzioa: "erosi"
                    }
                })
                    .done(function (informazioa) {
                        console.log("Response: " + informazioa);
                        if (informazioa == 'ongi') {
                            alert("Mila esker erosketagatik");
                            location.reload();
                        } else if (informazioa == 'error') {
                            alert("Zerbait gaizki atera da...");
                        } else if (informazioa == 'dberror') {
                            alert("dberror")
                        } else {
                            alert("Unexpected response: " + informazioa);
                        }
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        console.error("AJAX error: " + textStatus + ' : ' + errorThrown);
                        alert("Zerbaitek ez du funtzionatu")
                    })
                    .always(function () {

                    })
            }
            function saskitikAtera(saskiaId) {
                $.ajax({
                    url: "eragiketak.php",
                    method: "POST",
                    data: {
                        akzioa: "saskitikAtera",
                        saskiaId: saskiaId
                    }
                })
                    .done(function (informazioa) {
                        if (informazioa == 'ongi') {
                            alert("Produktua saskitik atera da");
                            location.reload();
                        } else if (informazioa == 'error') {
                            alert("Zerbait gaizki atera da...");
                        } else if (informazioa == 'dberror') {
                            alert("dberror")
                        }
                    })
                    .fail(function () {
                        alert("Zerbaitek ez du funtzionatu")
                    })
                    .always(function () {

                    })

            }
            function menuaIreki() {
                var win = $(window).width();
                if (win < 480) {
                    if ($(".menua").css('display') == "grid") {
                        $(".menua").css('display', "none");
                    } else {
                        $(".menua").css('display', "grid");
                    }
                }
            }
        </script>

    </header>
</body>

</html>