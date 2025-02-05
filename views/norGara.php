<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTech | Nor gara</title>
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css.css">
    </linkrel>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="norGara">
        <div class="hisIrudia">
            <img class="norGaraIrudiak" src="../public/irudiak/NOR GARA/LOKALA.png">
        </div>
        <div class="historiaIzenb">
            <h2 class="historia"><?= trans("historia") ?></h2>
        </div>
        <div class="historia">
            <p class="historia">
                <?= trans("historia1") ?>
            </p>
            <p class="historia">
                <?= trans("historia2") ?>
            </p>
            <p class="historia">
                <?= trans("historia3") ?>
            </p>
            <p class="historia">
                <?= trans("historia4") ?><br>
            </p>
        </div>
        <div class="helIrudia">
            <img class="norGaraIrudiak" src="../public/irudiak/NOR GARA/HELBURUAK.png" width="80%">
        </div>
        <div class="helburuakIzenb">
            <h2 class="helburuak"><?= trans("helburuak") ?></h2>
        </div>
        <div class="helburuak">
            <p class="helburuak">
                <?= trans("helburuak1") ?>
            </p>
            <p class="helburuak">
                <?= trans("helburuak2") ?>
            </p>
        </div>
    </div>

    <?php include 'footer.php'; ?>


</body>

</html>