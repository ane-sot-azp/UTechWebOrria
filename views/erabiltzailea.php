<!DOCTYPE html>
<html lang="eus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTech | Erabiltzailea</title>
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css.css">
    </linkrel>
    <style>

    </style>
</head>
</head>
<?php
require_once '../src/db.php';
$conn = konexioaEgin();
?>
<?php include 'header.php'; ?>
<div class="erabiltzaileaa">
<button class="openbtn1" onclick="openNav()">☰ <?= trans("aukerak") ?></button>
    <div class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a><br><br>
        <a onclick="showSection('section1')"><?= trans("sekz1") ?></a>
        <a onclick="showSection('section2')"><?= trans("sekz2") ?></a>
        <a onclick="showSection('section3')"><?= trans("sekz3") ?></a>
        <form method="post" action="../src/logout.php">
            <button class="erabBtn" type="submit">Saioa itxi</button>
        </form>
    </div>
    <div class="content">
        <div id="section1" class="section active">
            <h2 id="formularioa"><?= trans("newProduktua") ?></h2>
            <br>
            <form method="POST" action="">
                <label for="mota"><?= trans("mota") ?>:</label><span class="required">*</span><br>
                <select name="mota" id="mota">
                    <option value=""><?= trans("all") ?></option>
                    <option value="1"><?= trans("laptop") ?></option>
                    <option value="2"><?= trans("mobile") ?></option>
                    <option value="3"><?= trans("mon") ?></option>
                    <option value="4"><?= trans("aur") ?></option>
                </select> <br><br>
                <label for="marka"><?= trans("marka") ?>:</label><span class="required">*</span><br>
                <input class="kont" type="text" name="marka" id="marka" required /><br>
                <label for="modeloa"><?= trans("made") ?>:</label><span class="required">*</span><br>
                <input class="kont" type="modeloa" name="modeloa" id="modeloa" required /><br>
                <label for="ezaugarriak"><?= trans("ezaugarriak") ?></label><span class="required">*</span><br>
                <textarea class="kont" name="ezaugarriak" id="ezaugarriak"
                    placeholder="<?= trans("ezaugarriakMezua") ?>" required></textarea>
                <label for="egoera"><?= trans("egoera") ?>:</label><span class="required">*</span><br>
                <select name="egoera" id="egoera">
                    <option value="1"><?= trans("ondo") ?></option>
                    <option value="0"><?= trans("gaizki") ?></option>
                </select><br><br>
                <input type="submit" class="erabBtn prodBerr" value="<?= trans("send") ?>">
            </form>
        </div>
        <div id="section2" class="section">
            <div id="section2Kont">
                <h2 class=""><?= trans("erosketak") ?></h2>
                <?php
                $conn = konexioaEgin();
                if (!$conn) {
                    echo "dberror";
                }
                $id = $_SESSION['id'];
                $sql = "SELECT idEskaeraH, Produktua_idProduktua, kopurua, prezioa, egoera, data, faktura FROM eskaerahistorikoa WHERE Bezeroa_idBezeroa=$id ORDER BY data DESC";
                $result = $conn->query($sql);
                $orders = [];
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $orders[] = $row;
                        $dataa = substr( $orders[0]["data"], 0, 10); $orders[0]["data"];
                    }
                }
                
                if (!empty($orders)) {
                    echo '<div id="eskaera' . $orders[0]["idEskaeraH"] . '" class="eskaera"> ';
                    echo '<table width="100%">';
                    echo '<thead>';
                    echo '<tr><th>Data</th>';
                    echo '<th></th>';
                    echo '<th>' . trans("markaEsk") . '</th>';
                    echo '<th>' . trans("modeloEsk") . '</th>';
                    echo '<th>' . trans("kopuruEsk") . '</th>';
                    echo '<th>' . trans("prezioaEsk") . '</th>';
                    echo '</tr></thead><tbody>';
                
                    foreach ($orders as $order) {
                        $sql1 = "SELECT marka, modeloa, irudia1 FROM produktua WHERE idProduktua=" . $order["Produktua_idProduktua"];
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            $product = $result1->fetch_assoc();
                            echo '<tr>';
                            echo '<td>' . $dataa . '</td>';
                            echo '<td><a href="produktua.php?produktuid='.$order["Produktua_idProduktua"].'"><img src="../public/irudiak/PRODUKTUAK' . $product["irudia1"] . '" alt="produktua" width="100px" height="100px"></a></td>';
                            echo '<td>' . $product["marka"] . '</td>';
                            echo '<td>' . $product["modeloa"] . '</td>';
                            echo '<td>' . $order["kopurua"] . '</td>';
                            echo '<td>' . $order["prezioa"] . ' €</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</tbody></table>';
                    echo '</div>';
                } else {
                    echo '<h5><?= trans("eskEz") ?></h5>';
                }?>
            </div>
        </div>
        <div id="section3" class="section">
            <div id="section3Kont">
                <form class="eguneratu" id="bezeroAldaketa" method="POST" action="">
                    <h2 class="egunTitul"><?= trans("clientChange") ?></h2>
                    <?php
                    $conn = konexioaEgin();
                    if (!$conn) {
                        echo "dberror";
                    }
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM bezeroa WHERE idBezeroa='$id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $izena = $row["izena"];
                            $abizena = $row["abizena"];
                            $nan = $row["nanEdoNif"];
                            $postaElektronikoa = $row["postaElektronikoa"];
                            $telefonoZenbakia = $row["telefonoZenbakia"];
                            $helbidea = $row["helbidea"];
                            $herria = $row["herria"];
                            $postaKodea = $row["postaKodea"];
                        }
                    }
                    echo '<label for="izena">' . trans("izena") . ':</label><br>';
                    echo '<input type="text" id="izena" name="izena" value="' . $izena . '" required><br>';

                    echo '<label for="abizena">' . trans("abizena") . ':</label><br>';
                    echo '<input type="text" id="abizena" name="abizena" value="' . $abizena . '"
                    required><br>';
                    echo '<label for="nan">' . trans("nan") . ':</label><br>';
                    echo '<input type="text" id="nan" name="nan" value="' . $nan . '"
                    required><br>';
                    echo '<label for="postaElektronikoa">' . trans("email") . ':</label><br>';
                    echo '<input type="email" id="postaElektronikoa" name="postaElektronikoa"
                    value="' . $postaElektronikoa . '" required><br>';
                    echo '<label for="telefonoZenbakia">' . trans("tel") . ':</label><br>';
                    echo '<input type="tel" id="telefonoZenbakia" name="telefonoZenbakia"
                    value="' . $telefonoZenbakia . '"><br>';
                    echo '<label for="helbidea">' . trans("helbide") . ':</label><br>';
                    echo '<input type="text" id="helbidea" name="helbidea"
                    value="' . $helbidea . '"><br>';
                    echo '<label for="herria">' . trans("herria") . ':</label><br>';
                    echo '<input type="text" id="herria" name="herria"
                    value="' . $herria . '"><br>';
                    echo '<label for="postaKodea">' . trans("PK") . ':</label><br>';
                    echo '<input type="text" id="postaKodea" name="postaKodea"
                    value="' . $postaKodea . '"><br>';
                    echo '<input class="erabBtn eguneraketa" type="submit" value="' . trans("update") . '"></input>';

                    echo '</form>';
                    echo '<form class="eguneratu" id="pasahitzaAldaketa" method="POST" action="">';
                    echo '<h2 class="egunTitul">' . trans("passwordChange") . '</h2>';
                    echo '<label for="pasahitzaold">' . trans("oldpassword") . ':<span class="required">*</span></label>';
                    echo '<input type="password" id="pasahitzaold" name="pasahitzaold" required><br>';
                    echo '<label for="pasahitza2">' . trans("newpassword1") . ':<span class="required">*</span></label>';
                    echo '<input type="password" id="pasahitza2" name="pasahitza2" required><br>';
                    echo '<label for="pasahitza22">' . trans("newpassword2") . ':<span class="required">*</span></label>';
                    echo '<input type="password" id="pasahitza22" name="pasahitza22" required><br>';
                    echo '<input class="erabBtn pasahitzaEgun" type="submit" value="' . trans("update") . '"></input>';
                    ?>

                </form>
            </div>
        </div>
    </div>

</div>

<script>
    function openNav() {
                var win = $(window).width();
                $(".sidebar").css('display', "block");
                if (win > 480) {
                    $(".content").css('margin-left', 33 + "%");
                }
            }

            function closeNav() {
                var win = $(window).width();
                $(".sidebar").css('display', "none");
                if (win > 480) {
                    $(".content").css('margin-left', 0 + "%");
                }
            }
    $(document).ready(function () {
        $(".eguneraketa").on("click", function (e) {
            e.preventDefault();
            bezeroaEguneratu();
        })
        $(".pasahitzaEgun").on("click", function (e) {
            e.preventDefault();
            pasahitzaEguneratu();
        })
        $(".prodBerr").on("click", function (e) {
            e.preventDefault();
            produktuBerria();
        })
    })

    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(sectionId).classList.add('active');
        var win = $(window).width();
                $(".sidebar").css('display', "none");
                if (win > 480) {
                    $(".content").css('margin-left', 0 + "%");
                }

    }
    function bezeroaEguneratu() {
        var izena = $('#izena').val();
        var abizena = $('#abizena').val();
        var nan = $('#nan').val();
        var postaElektronikoa = $('#postaElektronikoa').val();
        var telefonoZenbakia = $('#telefonoZenbakia').val();
        var helbidea = $('#helbidea').val();
        var herria = $('#herria').val();
        var postaKodea = $('#postaKodea').val();

        $.ajax({
            url: "eragiketak.php",
            method: "POST",
            data: {
                akzioa: "bezeroaEguneratu",
                izena: izena,
                abizena: abizena,
                nan: nan,
                postaElektronikoa: postaElektronikoa,
                telefonoZenbakia: telefonoZenbakia,
                helbidea: helbidea,
                herria: herria,
                postaKodea: postaKodea
            }
        })
            .done(function (informazioa) {
                if (informazioa == 'ongi') {
                    alert(<?= trans("all") ?>);
                    window.location.href = "erabiltzailea.php";
                } else if (informazioa == 'error') {
                    alert("Error...");
                } else if (informazioa == 'falta') {
                    alert("Error...")
                }
            })
            .fail(function () {
                alert("Error...")
            })
            .always(function () {

            })
    }
    function pasahitzaEguneratu() {
        var pasahitzaold = $('#pasahitzaold').val();
        var sessionPasahitza = <?php echo $_SESSION['pasahitza']; ?>;
        var pasahitza1 = $('#pasahitza2').val();
        var pasahitza2 = $('#pasahitza22').val();

        $.ajax({
            url: "eragiketak.php",
            method: "POST",
            data: {
                akzioa: "pasahitzaEguneratu",
                pasahitza1: pasahitza1,
                pasahitza2: pasahitza2,
                pasahitzaold: pasahitzaold,
                sessionPasahitza: sessionPasahitza
            }
        })
            .done(function (informazioa) {
                if (informazioa == 'ongi') {
                    alert("Aldaketak eginda!");
                    window.location.href = "erabiltzailea.php";
                } else if (informazioa == 'error') {
                    alert("Zerbait gaizki joan da. Saiatu berriro beranduago.");
                } else if (informazioa == 'falta') {
                    alert("Pasahitzak ez dira berdinak!")
                } else if (informazioa == 'pasahitza') {
                    alert("Pasahitza okerra da!")
                }
            })
            .fail(function () {
                alert("Zerbaitek ez du funtzionatu")
            })
            .always(function () {

            })
    }
    function produktuBerria() {
        var mota = $('#mota').val();
        var marka = $('#marka').val();
        var modeloa = $('#modeloa').val();
        var ezaugarriak = $('#ezaugarriak').val();
        var egoera = $('#egoera').val();

        $.ajax({
            url: "eragiketak.php",
            method: "POST",
            data: {
                akzioa: "produktuBerria",
                mota: mota,
                marka: marka,
                modeloa: modeloa,
                ezaugarriak: ezaugarriak,
                egoera: egoera,
            }
        })
            .done(function (informazioa) {
                console.log("Response:", informazioa); // Debugging
                alert("Response: " + informazioa); // Show it
                if (informazioa == 'ongi') {
                    alert("Zure mezua bidali da, zurekin kontaktuan mantenduko gara!");
                    window.location.href = "erabiltzailea.php";
                } else if (informazioa == 'error') {
                    alert("Zerbait gaizki joan da. Saiatu berriro beranduago.");
                } else if (informazioa == 'falta') {
                    alert("Zerbait gaizki joan da.")
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