<?php
session_start();

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
                        <a class="right" href="#saskia"><i class="fa-solid fa-cart-shopping"></i></a>
                        <?php
                        if (isset($_SESSION["username"]) && $_SESSION["username"] != "") {
                            echo '<a class="right" href="erabiltzailea.php"><i class="fa-solid fa-user"></i></a>';
                        } else if(isset($_SESSION["username"]) AND $_SESSION["username"] == "") {
                            echo '<a class="right" href="login.php"><i class="fa-solid fa-user"></i></a>';
                        }

                        ?>
                        <div class="hizkuntza right">
                            <?php
                            $currentLang = isset($_SESSION['_LANGUAGE']) ? $_SESSION['_LANGUAGE'] : 'en';

                            // Muestra la bandera opuesta
                            if ($currentLang == 'en') {
                                echo '<form method="post">
                            <input type="hidden" name="selectedLang" value="eus">
                            <button class="right" type="submit" style="border:none; background:none;">
                                <img src="../public/irudiak/IKONOAK/ikurriña.png" alt="Euskara" style="width:20px;">
                            </button>
                            </form>';
                            } else {
                                echo '<form method="post">
                            <input type="hidden" name="selectedLang" value="en">
                            <button class="right" type="submit" style="border:none; background:none;">
                                <img src="../public/irudiak/IKONOAK/uk.png" alt="Ingelesa" style="width:20px;">
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
                <h2 class="lehioa"><?= trans("cart") ?></h2>
                <h3><?= trans("emptyCart") ?></h3>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
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
            $(document).ready(function () {
                $(".bidali").on("click", function (e) {
                    e.preventDefault();
                    loginaEgin();
                })

            })

            function loginaEgin() {
                var erabiltzailea = $('#erabiltzailea').val();
                var pasahitza = $('#pasahitza').val();
                $.ajax({
                    url: "eragiketak.php",
                    method: "POST",
                    data: {
                        akzioa: "loginaEgin",
                        erabiltzailea: erabiltzailea,
                        pasahitza: pasahitza
                    }
                })
                    .done(function (informazioa) {
                        if (informazioa == 'ongi') {
                            alert("Ongi etorri!")
                        } else if (informazioa == 'error') {
                            alert("Erabiltzailea edo pasahitza desegokiak dira");
                            $('#erabiltzailea').val("");
                            $('#pasahitza').val("");
                        }
                    })
                    .fail(function () {
                        alert("Zerbaitek ez du funtzionatu")
                    })
                    .always(function () {

                    })

            }
        </script>

    </header>
</body>

</html>