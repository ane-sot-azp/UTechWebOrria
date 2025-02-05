<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTech</title>
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <img class="deskontuak" src="<?= trans(indexPhrase: "deskontuIrudia") ?>" alt="deskontuak">
    <div class="produktuak">
        <h1><?= trans("azProd") ?></h1>
    </div>
        <div class="imagenes">
            <?php

            require_once '../src/db.php';
            $conn = konexioaEgin();

            $id1 = mt_rand(1,10);
            $id2 = mt_rand(11,20);
            $id3 = mt_rand(21,25);
            $id4 = mt_rand(26,30);

            $sql = "SELECT idProduktua, irudia1, marka, modeloa FROM produktua WHERE idProduktua=$id1 OR idProduktua=$id2 OR idProduktua=$id3 OR idProduktua=$id4";
            $result = $conn->query(query: $sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="imagen" id="imagen' . $row['idProduktua'] . '">';
                    echo '<a href="produktua.php?produktuid=' .$row['idProduktua'] .'" class="irudiak">';
                    echo '<img src="../public/irudiak/PRODUKTUAK/' . $row['irudia1'] . '" alt="Imagen ' . $row['idProduktua'] . '">';
                    echo '</a>';
                    echo '<p class="deskribapena">' . $row['marka'] . ' ' . $row['modeloa'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo trans("noResult");
            }

            $conn->close();
            ?>
        </div>
    <div class="produktuak">
        <h1><?= trans("albTitul") ?></h1>
    </div>
    <div class="albiste">
        <div class="albisteak1">
            <div class="albisteIrudia">
                <img src="../public/irudiak/ALBISTEAK/20241023124623_adimen-artifiziala-dls-zu_amp_w1200.jpg" width="100%">
            </div>
            <div class="izenburua">
                <h2><?= trans("alb1Titul") ?></h2>
            </div>
            <div class="laburpena">
                <h5><?= trans("alb1Lab") ?></h5>
            </div>
            <div class="albistea">
                <p><?= trans("alb1Alb1") ?></p><br>

                <p><?= trans("alb1Alb2") ?></p><br>

                <p><?= trans("alb1Alb3") ?></p><br>

                <p><?= trans("alb1Alb4") ?></p><br>
            </div>
        </div>
        <div class="albisteak2">
            <div class="albisteIrudia">
                <img src="../public/irudiak/ALBISTEAK/20241018105413_urko-esnaola_foto610x342.jpg" width="100%">
            </div>
            <div class="izenburua">
                <h2><?= trans("alb2Titul") ?></h2>
            </div>
            <div class="laburpena">
                <h5><?= trans("alb2Lab") ?></h5>
            </div>
            <div class="albistea">
                <p><?= trans("alb2Alb1") ?></p><br>

                <p><?= trans("alb2Alb2") ?></p><br>

                <p><?= trans("alb2Alb3") ?></p><br>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    


</body>

</html>