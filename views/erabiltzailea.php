<!DOCTYPE html>
<html lang="eus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTech | Katalogoa</title>
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
    <div class="sidebar2">
        <a onclick="showSection('section1')"><?= trans("sekz1") ?></a>
        <a onclick="showSection('section2')"><?= trans("sekz2") ?></a>
        <a onclick="showSection('section3')"><?= trans("sekz3") ?></a>
        <form method="post" action="../src/logout.php">
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
    <div class="content">
        <div id="section1" class="section active">
            <h2 id="formularioa"><?= trans("newProduktua") ?></h2>
            <br>
            <form method="POST" action="">
                <label for="mota"><?= trans("mota") ?>:</label><span class="required">*</span><br>
                <select name="mota">
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
                <select name="egoera">
                    <option value="1"><?= trans("ondo") ?></option>
                    <option value="2"><?= trans("gaizki") ?></option>
                </select><br><br>
                <input type="submit" class="botoiak2" value="<?= trans("send") ?>">
            </form>
        </div>
        <div id="section2" class="section">
            <h2>Sección 2</h2>
            <p>Contenido de la sección 2.</p>
        </div>
        <div id="section3" class="section">
            <h2 class=""><?= trans("newClient") ?></h2>
            <form class="eguneratu" method="POST" action="">
                <label class="ezkerra"for="izena"><?= trans("izena") ?>:</label>
                <input class="ezkerra" type="text" id="izena" name="izena" value="<?php echo $_SESSION["izena"] ?>" required><br>
                <label class="eskubi" for="abizena"><?= trans("abizena") ?>:</label>
                <input class="eskubi" type="text" id="abizena" name="abizena" value="<?php echo $_SESSION["abizena"] ?>" required><br>
                <label class="ezkerra" for="nan"><?= trans("nan") ?>:</label>
                <input class="ezkerra" type="text" id="nan" name="nan" value="<?php echo $_SESSION['nanEdoNif'] ?>" required><br>
                <label class="eskubi" for="postaElektronikoa"><?= trans("email") ?>:</label>
                <input class="eskubi" type="email" id="postaElektronikoa" name="postaElektronikoa" value="<?php echo $_SESSION['username'] ?>" required><br>
                <label class="ezkerra" for="telefonoZenbakia"><?= trans("tel") ?>:</label>
                <input class="ezkerra" type="tel" id="telefonoZenbakia" name="telefonoZenbakia" value="<?php echo $_SESSION['telefonoZenbakia'] ?>" ><br>
                <label class="eskubi"for="helbidea"><?= trans("helbide") ?>:</label>
                <input class="eskubi" type="text" id="helbidea" name="helbidea" value="<?php echo $_SESSION['helbidea'] ?>" ><br>
                <label class="ezkerra" for="herria"><?= trans("herria") ?>:</label>
                <input class="ezkerra" type="text" id="herria" name="herria" value="<?php echo $_SESSION['herria'] ?>" ><br>
                <label class="eskubi"for="postaKodea"><?= trans("PK") ?>:</label>
                <input class="eskubi" type="text" id="postaKodea" name="postaKodea" value="<?php echo $_SESSION['postaKodea'] ?>" ><br>
                <label class="ezkerra" for="pasahitza2"><?= trans("password") ?>:</label>
                <input class="ezkerra" type="password" id="pasahitza2" name="pasahitza2" required><br>
                <label class="eskubi"for="pasahitza22"><?= trans("password") ?>:</label>
                <input class="eskubi" type="password" id="pasahitza22" name="pasahitza22" required><br>
                <input class="botoiak2" type="submit" value="<?= trans("signUp") ?>"></input>
            </form>
        </div>
    </div>

</div>

<script>
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(sectionId).classList.add('active');
    }
</script>


</body>

</html>