<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTech | Login</title>
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css.css" />
</head>

<body>
<div class="hidden">
    <?php include 'header.php'; ?>
</div>
    <div class="login" id="login">
        <div id="saioHasiera">
            <a href="hasiera.php"><img src="../public/irudiak/IKONOAK/LOGO.svg"
                    width="40%" /><br><br><br><br><br><br></a>
            <h3 class=""><?= trans("signIn") ?></h3><br><br>
            <form method="POST" action="">
                <label for="erabiltzailea"><?= trans("user") ?>:<span class="required"><span
                            class="required">*</span></span></label><br>
                <input class="" type="text" id="erabiltzailea" name="erabiltzailea" required><br><br>
                <label for="pasahitza"><?= trans("password") ?>:<span class="required"><span
                            class="required">*</span></span></label><br>
                <input class="" type="password" id="pasahitza" name="pasahitza" required><br><br>
                <button class="bidali" type="submit"><?= trans("signIn") ?></button>
            </form>
        </div>
        <div id="erregistroa">
            <h3 class=""> <!-- <a href="#miDiv"> --><?= trans("newClient") ?> <!-- </a> --></h3><br><br>
            <form id="miDiv" method="POST" action="">
                <label for="izena"><?= trans("izena") ?>:<span class="required"><span class="required">*</span></span></label><br>
                <input class="" type="text" id="izena" name="izena" required><br><br>
                <label for="abizena"><?= trans("abizena") ?>:<span class="required"><span class="required">*</span></span></label><br>
                <input class="" type="text" id="abizena" name="abizena" required><br><br>
                <label for="nan"><?= trans("nan") ?>:<span class="required"><span class="required">*</span></span></label><br>
                <input class="" type="text" id="nan" name="nan" required><br><br>
                <label for="postaElektronikoa"><?= trans("email") ?>:<span class="required">*</span></label><br>
                <input class="" type="email" id="postaElektronikoa" name="postaElektronikoa" required><br><br>
                <label for="telefonoZenbakia"><?= trans("tel") ?>:<span class="required">*</span></label><br>
                <input class="a" type="tel" id="telefonoZenbakia" name="telefonoZenbakia"><br><br>
                <label for="helbidea"><?= trans("helbide") ?>:</label><br>
                <input class="" type="text" id="helbidea" name="helbidea"><br><br>
                <label for="herria"><?= trans("herria") ?>:</label><br>
                <input class="" type="text" id="herria" name="herria"><br><br>
                <label for="postaKodea"><?= trans("PK") ?>:</label><br>
                <input class="" type="text" id="postaKodea" name="postaKodea"><br><br>
                <label for="pasahitza2"><?= trans("password") ?>:<span class="required">*</span></label><br>
                <input class="" type="password" id="pasahitza2" name="pasahitza2" required><br><br>
                <button class="erregistratu" type="submit"><?= trans("signUp") ?></button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $(".bidali").on("click", function (e) {
                e.preventDefault();
                loginaEgin();
            })
            $(".erregistratu").on("click", function (e) {
                e.preventDefault();
                erregistroaEgin();
            })

        })

        function loginaEgin() {
            var erabiltzailea = $('#erabiltzailea').val();
            var pasahitza = $('#pasahitza').val();
            $.ajax({
                url: "../src/eragiketak.php",
                method: "POST",
                data: {
                    akzioa: "loginaEgin",
                    erabiltzailea: erabiltzailea,
                    pasahitza: pasahitza
                }
            })
                .done(function (informazioa) {
                    if (informazioa == 'ongi') {
                        var usuario = <?php echo $_SESSION["izena"]; ?>
                        alert("Ongi etorri "+usuario+"!");
                        //window.location.href = "hasiera.php";
                    } else if (informazioa == 'error') {
                        alert("Erabiltzailea edo pasahitza desegokiak dira");
                        $('#erabiltzailea').val("");
                        $('#pasahitza').val("");
                    } else if (informazioa == 'falta') {
                        alert("Erabiltzaile edo/eta pasahitza hutsik daude.")
                    }
                })
                .fail(function () {
                    alert("Zerbaitek ez du funtzionatu")
                })
                .always(function () {

                })

        }
        function erregistroaEgin() {
            var izena = $('#izena').val();
            var abizena = $('#abizena').val();
            var nan = $('#nan').val();
            var postaElektronikoa = $('#postaElektronikoa').val();
            var telefonoZenbakia = $('#telefonoZenbakia').val();
            var helbidea = $('#helbidea').val();
            var herria = $('#herria').val();
            var postaKodea = $('#postaKodea').val();
            var pasahitza2 = $('#pasahitza2').val();

            $.ajax({
                url: "../src/eragiketak.php",
                method: "POST",
                data: {
                    akzioa: "erregistroaEgin",
                    izena: izena,
                    abizena: abizena,
                    nan: nan,
                    postaElektronikoa: postaElektronikoa,
                    telefonoZenbakia: telefonoZenbakia,
                    helbidea: helbidea,
                    herria: herria,
                    postaKodea: postaKodea,
                    pasahitza2: pasahitza2
                }
            })
                .done(function (informazioa) {
                    if (informazioa == 'ongi') {
                        alert("Ongi etorri!")
                    } else if (informazioa == 'error') {
                        alert("Zerbait gaizki joan da. Saiatu berriro beranduago.");
                    } else if (informazioa == 'falta') {
                        alert("Datuak falta dira erregistroa egin ahal izateko.")
                    } else if (informazioa == 'repe') {
                        alert("Dagoeneko norbait erregistratu da posta elektroniko honekin.")
                    }
                })
                .fail(function () {
                    alert("Zerbaitek ez du funtzionatu")
                })
                .always(function () {

                })

        }
    </script>

</body>

</html>