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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>UTech | <?php echo $marka . ' ' . $modeloa ?></title>
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

        $sql = "SELECT * FROM produktua WHERE idProduktua=$idProduktua";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="produktuaIrudia" id="produktuairudia' . $row['idProduktua'] . '" data-alternate-image="../public/irudiak/PRODUKTUAK/' . $row['irudia2'] . '">';
                echo '<a href="produktua.php?produktuid=' . $row['idProduktua'] . '" class="prodaIrudiak">';
                echo '<img id="argazkia1" src="../public/irudiak/PRODUKTUAK/' . $row['irudia1'] . '" alt="Irudia ' . $row['idProduktua'] . '">';
                echo '</a>';
                echo '</div>';
                echo '<div class="produktuaInfo" id="produktuainfo' . $row['idProduktua'] . '">';
                echo '<p class="produktuIzena">' . $row['marka'] . ' ' . $row['modeloa'] . '</p><br>';
                echo '<h1>' . $row['salmentaPrezioa'] . '€</h1><br>';
                echo '<button class="produktubtn" onclick="saskira(' . $row['idProduktua'] . ')">Saskira sartu</button>';

                switch ($row['ProduktuMota_idProduktuMota']) {
                    case 1:
                        echo '<p><b>'.trans("memoria").':</b> ' . $row['memoria'] . '</p><br>';
                        echo '<p><b>'.trans("ram").':</b> ' . $row['ram'] . '</p><br>';
                        echo '<p><b>'.trans("prozes").':</b> ' . $row['prozesagailua'] . '</p><br>';
                        echo '<p><b>'.trans("size").':</b> ' . $row['tamaina'] . '</p><br>';
                        echo '<p><b>'.trans("sErag").':</b> ' . $row['sistemaEragilea'] . '</p><br>';
                        break;
                    case 2:
                        echo '<p><b>'.trans("memoria").':</b> ' . $row['memoria'] . '</p><br>';
                        echo '<p><b>'.trans("ram").':</b> ' . $row['ram'] . '</p><br>';
                        echo '<p><b>'.trans("prozes").':</b> ' . $row['prozesagailua'] . '</p><br>';
                        echo '<p><b>'.trans("size").':</b> ' . $row['tamaina'] . ' pulgada</p><br>';
                        echo '<p><b>'.trans("sErag").':</b> ' . $row['sistemaEragilea'] . '</p><br>';
                        echo '<p><b>'.trans("kamara").':</b> ' . $row['kamara'] . '</p><br>';
                        echo '<p><b>'.trans("kolorea").':</b> ' . $row['kolorea'] . '</p><br>';
                        break;
                    case 3:
                        echo '<p><b>'.trans("size").':</b> ' . $row['tamaina'] . ' pulgada</p><br>';
                        echo '<p><b>'.trans("erresol").':</b> ' . $row['erresoluzioa'] . '</p><br>';
                        echo '<p><b>'.trans("frek").':</b> ' . $row['frekuentzia'] . '</p><br>';
                        break;
                    case 4:
                        echo '<p><b>'.trans("prozes").':</b> ' . $row['prozesagailua'] . '</p><br>';
                        echo '<p><b>'.trans("size").':</b> ' . $row['tamaina'] . ' pulgada</p><br>';
                        echo '<p><b>'.trans("kolorea").':</b> ' . $row['kolorea'] . '</p><br>';
                        break;
                    default:
                        break;
                }
                echo '</div>';
            }
        } else {
            echo trans("noResult");
        }

        $conn->close();
        ?>
    </div>
    <script>
        function saskira(produktuaId) {
                    $.ajax({
                        url: "eragiketak.php",
                        method: "POST",
                        data: {
                            akzioa: "saskira",
                            produktuaId: produktuaId
                        }
                    })
                        .done(function (informazioa) {
                            if (informazioa == 'ongi') {
                                alert("<?= trans("saskiratu") ?>");
                                location.reload();
                            } else if (informazioa == 'error') {
                                alert("Error...");
                            } else if (informazioa == 'dberror') {
                                alert("dberror")
                            }else if (informazioa == 'login') {
                            alert("Logina egin behar duzu erosi ahal izateko!");
                            window.location.href = "login.php";
                        }
                        })
                        .fail(function () {
                            alert("Error...")
                        })
                        .always(function () {

                        })

                }
        $(function () {
            
            $(".produktuaIrudia").hover(function (e) {
                const originalSrc = $(this).find("img").attr("src");
                const alternateImage = $(this).data("alternate-image");
                $(this).find("img").attr("src", alternateImage);
                $(this).one("mouseleave", function () {
                    $(this).find("img").attr("src", originalSrc);
                });
            });
        });
    </script>
<?php include 'footer.php';
    ?>
</body>

</html>