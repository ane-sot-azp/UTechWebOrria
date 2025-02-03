<!DOCTYPE html>
<html>

<head>
    <?php
    if (isset($_GET['produktuid'])) {
        $idProduktua = $_GET['produktuid'];
    }
    require_once '../src/db.php';
    $conn = konexioaEgin();
    $sql = "SELECT marka, modeloa FROM produktua WHERE idProduktua=$idProduktua";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $marka = $row['marka'];
            $modeloa = $row['modeloa'];
        }
    }
    ?>
    <meta charset="utf-8">
    <title>Utech | <?php echo $marka . ' ' . $modeloa ?></title>
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css.css">
    </link>
</head>

<body>

    <?php include 'header.php';
    ?>

    <div class="produktuaHandi">
        <?php

        $sql = "SELECT idProduktua, ProduktuMota_idProduktuMota, irudia1, irudia2, marka, modeloa, memoria, ram, prozesagailua, tamaina, sistemaEragilea, kamara, erresoluzioa, frekuentzia, kolorea, salmentaPrezioa FROM produktua WHERE idProduktua=$idProduktua";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="produktuaIrudia" id="produktuairudia' . $row['idProduktua'] . '" data-alternate-image="../public/irudiak/PRODUKTUAK/' . $row['irudia2'] . '">';
                echo '<a href="produktua.php?produktuid=' . $row['idProduktua'] . '" class="prodaIrudiak">';
                echo '<img width="40%" id="argazkia" src="../public/irudiak/PRODUKTUAK/' . $row['irudia1'] . '" alt="Irudia ' . $row['idProduktua'] . '">';
                echo '</a>';
                echo '</div>';
                echo '<div class="produktuaInfo" id="produktuainfo' . $row['idProduktua'] . '">';
                echo '<p class="produktuIzena">' . $row['marka'] . ' ' . $row['modeloa'] . '</p><br>';
                echo '<h1>' . $row['salmentaPrezioa'] . '€</h1><br>';
                echo '<button class="produktubtn" href="">Saskira sartu</button>';

                switch ($row['ProduktuMota_idProduktuMota']) {
                    case 1:
                        echo '<p><b>Memoria:</b> ' . $row['memoria'] . '</p><br>';
                        echo '<p><b>RAM:</b> ' . $row['ram'] . '</p><br>';
                        echo '<p><b>Prozesagailua:</b> ' . $row['prozesagailua'] . '</p><br>';
                        echo '<p><b>Tamaina:</b> ' . $row['tamaina'] . ' pulgada</p><br>';
                        echo '<p><b>Sistema Eragilea:</b> ' . $row['sistemaEragilea'] . '</p><br>';
                        break;
                    case 2:
                        echo '<p><b>Memoria:</b> ' . $row['memoria'] . '</p><br>';
                        echo '<p><b>RAM:</b> ' . $row['ram'] . '</p><br>';
                        echo '<p><b>Prozesagailua:</b> ' . $row['prozesagailua'] . '</p><br>';
                        echo '<p><b>Tamaina:</b> ' . $row['tamaina'] . ' pulgada</p><br>';
                        echo '<p><b>Sistema Eragilea:</b> ' . $row['sistemaEragilea'] . '</p><br>';
                        echo '<p><b>Kamara:</b> ' . $row['kamara'] . '</p><br>';
                        echo '<p><b>Kolorea:</b> ' . $row['kolorea'] . '</p><br>';
                        break;
                    case 3:
                        echo '<p><b>Tamaina:</b> ' . $row['tamaina'] . ' pulgada</p><br>';
                        echo '<p><b>Erresoluzioa:</b> ' . $row['erresoluzioa'] . '</p><br>';
                        echo '<p><b>Frekuentzia:</b> ' . $row['frekuentzia'] . '</p><br>';
                        break;
                    case 4:
                        echo '<p><b>Prozesagailua:</b> ' . $row['prozesagailua'] . '</p><br>';
                        echo '<p><b>Tamaina:</b> ' . $row['tamaina'] . ' pulgada</p><br>';
                        echo '<p><b>Kolorea:</b> ' . $row['kolorea'] . '</p><br>';
                        break;
                    default:
                        break;
                }
                echo '</div>';
            }
        } else {
            echo "Ez da produkturik aurkitu";
        }

        $conn->close();
        ?>
    </div>
    <script>
        $(function () {
            $(".produktuaIrudia").hover(function (e) {
                // Store original src for hover off
                const originalSrc = $(this).find("img").attr("src");

                // Get the alternate image path from data attribute
                const alternateImage = $(this).data("alternate-image");

                // Change the image source
                $(this).find("img").attr("src", alternateImage);

                // Bind hover off event
                $(this).one("mouseleave", function () {
                    $(this).find("img").attr("src", originalSrc);
                });
            });
        });
    </script>

</body>

</html>