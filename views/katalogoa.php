<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTech | Katalogoa</title>
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="../public/irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css.css">
    </linkrel>
</head>

<body>
    <?php
    require_once '../src/db.php';
    $conn = konexioaEgin();
    $bilatu = isset($_GET['bilaketa']) ? $_GET['bilaketa'] : '';
    ?>
    <?php include 'header.php'; ?>

    <div class="general">
        <button class="openbtn" onclick="openNav()">☰ <?= trans("filtro") ?></button>
        <div class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a><br><br>
            <ul class="prod">
                <form method="GET">
                    <li>
                        <label for="mota">
                            <h3 class="pm"><?= trans(indexPhrase: "mota") ?>:</h3>
                        </label><br>
                        <select name="mota" id="mota">
                            <option value=""><?= trans("all") ?></option>
                            <option value="1"><?= trans("laptop") ?></option>
                            <option value="2"><?= trans("mobile") ?></option>
                            <option value="3"><?= trans("mon") ?></option>
                            <option value="4"><?= trans("aur") ?></option>
                        </select> <br><br>
                    </li>
                    <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check" id="item1">
                            <label class="accordion-title" for="item1">
                                <h3><?= trans("marka") ?>:</h3>
                            </label>
                            <div class="accordion-content">
                                <?php
                                $sql = "SELECT marka FROM produktua GROUP BY marka";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo ' <input type="checkbox" id="' . $row['marka'] . '" name="marka[]" value="' . $row['marka'] . '" />';
                                        echo '<label for="' . $row['marka'] . '">' . $row['marka'] . '</label><br>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <br>
                    <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check mycheck" id="item2">
                            <label class="accordion-title" for="item2">
                                <h3><?= trans(indexPhrase: "prozes") ?>:</h3>
                            </label>
                            <div class="accordion-content">
                                <?php
                                $sql = "SELECT prozesagailua FROM produktua WHERE prozesagailua IS NOT NULL GROUP BY prozesagailua";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo ' <input type="checkbox" id="' . $row['prozesagailua'] . '" name="prozesagailua[]" value="' . $row['prozesagailua'] . '" />';
                                        echo '<label for="' . $row['prozesagailua'] . '">' . $row['prozesagailua'] . '</label><br>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li> <br>
                    <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check mycheck" id="item3">
                            <label class="accordion-title" for="item3">
                                <h3><?= trans("size") ?>:</h3>
                            </label>
                            <div class="accordion-content">
                                <?php
                                $sql = "SELECT tamaina FROM produktua WHERE tamaina IS NOT NULL GROUP BY tamaina";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo ' <input type="checkbox" id="' . $row['tamaina'] . '" name="tamaina[]" value="' . $row['tamaina'] . '" />';
                                        echo '<label for="' . $row['tamaina'] . '">' . $row['tamaina'] . '</label><br>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li><br>
                    <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check mycheck" id="item4">
                            <label class="accordion-title" for="item4">
                                <h3><?= trans("sErag") ?>:</h3>
                            </label>
                            <div class="accordion-content">
                                <?php
                                $sql = "SELECT sistemaEragilea FROM produktua WHERE sistemaEragilea IS NOT NULL GROUP BY sistemaEragilea";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo ' <input type="checkbox" id="' . $row['sistemaEragilea'] . '" name="sistemaEragilea[]" value="' . $row['sistemaEragilea'] . '" />';
                                        echo '<label for="' . $row['sistemaEragilea'] . '">' . $row['sistemaEragilea'] . '</label><br>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li> <br>
                    <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check mycheck" id="item5">
                            <label class="accordion-title" for="item5">
                                <h3><?= trans("price") ?>:</h3>
                            </label>
                            <div class="accordion-content">
                                <input type="checkbox" name="prezioa[]" id="merkea" value="0-150" />
                                <label for="merkea">0€-150€</label> <br>
                                <input type="checkbox" name="prezioa[]" id="aukerakoa" value="151-250" />
                                <label for="aukerakoa">151€-250€</label> <br>
                                <input type="checkbox" name="prezioa[]" id="garestia" value="251-500" />
                                <label for="garestia">251€-500€</label> <br>
                                <input type="checkbox" name="prezioa[]" id="luxuzkoa" value="501-99999" />
                                <label for="luxuzkoa">501€+</label> <br>
                                <br>
                            </div>
                        </div><br><br>
                    </li>
                    <input class="botoiaez" type="reset" id="ezabatu" value="<?= trans("erase") ?>" />
                </form>
            </ul>
        </div>


        <div class="produktuakKat">
            <?php
            if ($bilatu != "") {
                $sql = "SELECT * FROM produktua WHERE marka LIKE '%$bilatu%' OR modeloa LIKE '%$bilatu%'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="produktuaKat" id="' . $row["idProduktua"] . '">';
                        echo '<a href="produktua.php?produktuid=' . $row["idProduktua"] . '" class="prodIrudiak">';
                        echo '<img id="argazkia" src="../public/irudiak/PRODUKTUAK/' . $row["irudia1"] . '" alt="Irudia ' . $row["idProduktua"] . '"></a>';
                        echo '<p><b>' . trans("marka") . ':</b> ' . $row["marka"] . '</p><br>';
                        echo '<p style="height:40px"><b>' . trans("made") . ':</b> ' . $row["modeloa"] . '</p>';
                        echo '<p><b>' . trans("price") . ':</b> ' . $row["salmentaPrezioa"] . '€</p><br>';
                        echo '<a class="saskira" onclick="saskira(' . $row["idProduktua"] . ')" href=""><i class="fa-solid fa-cart-plus"></i></a>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>


            function openNav() {
                var win = $(window).width();
                $(".sidebar").css('display', "block");
                if (win > 480) {
                    $(".produktuakKat").css('margin-left', 33 + "%");
                }
            }

            function closeNav() {
                var win = $(window).width();
                $(".sidebar").css('display', "none");
                if (win > 480) {
                    $(".produktuakKat").css('margin-left', 0 + "%");
                }
            }
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
                            alert("Logina egin behar duzu erosi ahal izateko.");
                            window.location.href = "login.php";
                        }
                        
                    })
                    .fail(function () {
                        alert("Error...")
                    })
                    .always(function () {

                    })

            }
            $(document).ready(function () {

                function hautatutakoBaloreak(name) {
                    var baloreak = [];
                    $(`input[name="${name}[]"]:checked`).each(function () {
                        baloreak.push($(this).val());
                    });
                    return baloreak;
                }

                function produktuakFiltratu() {
                    var filtroak = {
                        mota: $('#mota').val(),
                        marka: hautatutakoBaloreak('marka'),
                        prozesagailua: hautatutakoBaloreak('prozesagailua'),
                        tamaina: hautatutakoBaloreak('tamaina'),
                        sistemaEragilea: hautatutakoBaloreak('sistemaEragilea'),
                        prezioa: hautatutakoBaloreak('prezioa')
                    };

                    $.ajax({
                        url: '../src/filtroa.php',
                        method: 'GET',
                        data: filtroak,
                        success: function (informazioa) {
                            produktuZerrendaBirkargatu(informazioa);
                        },
                        error: function (xhr, status, error) {
                            console.error('Errore bat egon da:', error);
                        }
                    });
                }

                function produktuZerrendaBirkargatu(produktuak) {
                    var edukia = '';
                    if (produktuak.length === 0) {
                        edukia = '<div class="no-results">Ez dago produkturik parametro horiekin.</div>';
                    } else {
                        $.each(produktuak, function (index, produktua) {
                            edukia += `
                    <div class="produktuaKat" id="produktua${produktua.idProduktua}">
                        <a href="produktua.php?produktuid=${produktua.idProduktua}" class="prodIrudiak">
                            <img id="argazkia" src="../public/irudiak/PRODUKTUAK/${produktua.irudia1}" alt="Irudia ${produktua.idProduktua}">
                        </a>
                        <p><b><?= trans("marka") ?>:</b> ${produktua.marka}</p><br>
                        <p style="height:40px"><b><?= trans("made") ?>:</b> ${produktua.modeloa}</p>
                        <p><b><?= trans("price") ?>:</b> ${produktua.salmentaPrezioa}€</p><br>
                        <a class="saskira" onclick="saskira(${produktua.idProduktua})" href=""><i class="fa-solid fa-cart-plus"></i></a>
                    </div>
                `;
                        });
                    }
                    $('.produktuakKat').html(edukia);
                }

                $('#mota').change(produktuakFiltratu);
                $('input[name="marka[]"]').change(produktuakFiltratu);
                $('input[name="prozesagailua[]"]').change(produktuakFiltratu);
                $('input[name="tamaina[]"]').change(produktuakFiltratu);
                $('input[name="sistemaEragilea[]"]').change(produktuakFiltratu);
                $('input[name="prezioa[]"]').change(produktuakFiltratu);

                if ($('.produktuakKat').html().trim() === '') {
                    produktuakFiltratu();
                }

            });
        </script>

    </div>

    <?php include 'footer.php'; ?>


</body>

</html>