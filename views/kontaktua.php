<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>UTech | Kontaktua</title>
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css.css">
    </linkrel>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="kontaktua">
        <div class="mapa">
        <h2 id="formularioa"><?= trans("non") ?></h2><br>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d375.34188198830094!2d-2.18120071344725!3d43.05354558108277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd50365ee96e9269%3A0x967b005b094dd634!2sC.%20Urdaneta%2C%206%2C%2020240%20Ordizia%2C%20Guip%C3%BAzcoa!5e1!3m2!1ses!2ses!4v1729588843286!5m2!1ses!2ses"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="infoForm">
            <h2 id="formularioa"><?= trans("kontakt") ?></h2><br>
            <form>
                <label for="name"><?= trans("izena") ?>Izena</label><span class="required">*</span><br>
                <input class="kont" type="text" id="name" required><br>
                <label for="surname"><?= trans("abizena") ?>Abizena</label><br>
                <input class="kont" type="text" id="surname"><br>
                <label for="mail"><?= trans("email") ?>Posta elektronikoa</label><span class="required">*</span><br>
                <input class="kont" type="email" id="mail" placeholder="<?= trans("emailPH") ?>" required><br>
                <label for="tel"><?= trans("tel") ?>Telefonoa</label><br>
                <input class="kont" type="tel" id="tel" placeholder="123 45 67 89"><br>
                <label for="longtext"><?= trans("subject") ?>Gaia</label><span class="required">*</span><br>
                <textarea class="kont" id="longtext" placeholder="<?= trans("message") ?>" required></textarea>
                <input class="botoiak" type="submit" value="<?= trans("send") ?>Bidali"><input class="botoiak" type="reset" value="<?= trans("erase") ?>Ezabatu">
            </form>
        </div>
        <div class="hornitzailea">
            <h2 id="formularioa"><?= trans("newHornitzaile") ?></h2>
            <br>
            <form method="POST" action="">
                <label for="izena"><?= trans("izena") ?>:</label><span class="required">*</span><br>
                <input type="text" name="izena" id="izena" required/><br>
                <label for="nif"><?= trans("nif") ?>:</label><span class="required">*</span><br>
                <input type="text" name="nif" id="nif" required/><br>
                <label for="postaElektronikoa"><?= trans("email") ?>:</label><span class="required">*</span><br>
                <input type="email" name="postaElektronikoa" id="postaElektronikoa"
                    placeholder="<?= trans("emailPH") ?>" required/><br>
                <label for="telefonoZenbakia"><?= trans("tel") ?>:</label><br>
                <input type="tel" name="telefonoZenbakia" id="telefonoZenbakia" /><br>
                <label for="helbidea"><?= trans("helbide") ?>:</label><span class="required">*</span><br>
                <input type="text" name="helbidea" id="helbidea" required/><br>
                <label for="herria"><?= trans("herria") ?>:</label><span class="required">*</span><br>
                <input type="text" name="herria" id="herria" required/><br>
                <label for="postaKodea"><?= trans("PK") ?>:</label><span class="required">*</span><br>
                <input type="text" name="postaKodea" id="postaKodea" required/><br>
                <input type="submit" class="botoiak1" value="<?= trans("send") ?>">
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $(".botoiak1").on("click", function (e) {
                e.preventDefault();
                hornitzailea();
            })

        })

        function hornitzailea() {
            var izena = $('#izena').val();
            var nif = $('#nif').val();
            var postaElektronikoa = $('#postaElektronikoa').val();
            var telefonoZenbakia = $('#telefonoZenbakia').val();
            var helbidea = $('#helbidea').val();
            var herria = $('#herria').val();
            var postaKodea = $('#postaKodea').val();

            $.ajax({
                url: "eragiketak.php",
                method: "POST",
                data: {
                    akzioa: "hornitzailea",
                    izena: izena,
                    nif: nif,
                    postaElektronikoa: postaElektronikoa,
                    telefonoZenbakia: telefonoZenbakia,
                    helbidea: helbidea,
                    herria: herria,
                    postaKodea: postaKodea
                }
            })
                .done(function (informazioa) {
                    if (informazioa == 'ongi') {
                        alert("Ongi etorri!")
                        $('#izena').val('');
                        $('#nif').val('');
                        $('#postaElektronikoa').val('');
                        $('#telefonoZenbakia').val('');
                        $('#helbidea').val('');
                        $('#herria').val('');
                        $('#postaKodea').val('');
                    } else if (informazioa == 'error') {
                        alert("Zerbait gaizki joan da. Saiatu berriro beranduago.");
                        $('#izena').val('');
                        $('#nif').val('');
                        $('#postaElektronikoa').val('');
                        $('#telefonoZenbakia').val('');
                        $('#helbidea').val('');
                        $('#herria').val('');
                        $('#postaKodea').val('');
                    } else if (informazioa == 'falta') {
                        alert("Datuak falta dira erregistroa egin ahal izateko.");
                    } else if (informazioa == 'repe') {
                        alert("Dagoeneko norbait erregistratu da NIF honekin.");
                        $('#izena').val('');
                        $('#nif').val('');
                        $('#postaElektronikoa').val('');
                        $('#telefonoZenbakia').val('');
                        $('#helbidea').val('');
                        $('#herria').val('');
                        $('#postaKodea').val('');
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