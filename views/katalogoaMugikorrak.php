<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Utech | Katalogoa</title>
    <link rel="icon" href="irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">
    </linkrel>
</head>

<body>
    <?php include 'header.php'; ?>
    <?php
    require_once 'db.php';
    $conn = konexioaEgin();
    ?>
    
    <div class="general">
        <div class="sidebar">
            <ul class="prod">
                <form>
                <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check" id="item1">
                            <label class="accordion-title" for="item1">
                                <h3>Marka:</h3>
                            </label>
                            <div class="accordion-content">
                                <?php
                                $sql = "SELECT marka FROM produktua WHERE ProduktuMota_idProduktuMota=2 GROUP BY marka";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo ' <input type="checkbox" id="' . $row['marka'] . '" name="' . $row['marka'] . '" value="' . $row['marka'] . '" />';
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
                            <input type="checkbox" class="check" id="item2">
                            <label class="accordion-title" for="item2">
                                <h3>Prozesagailua:</h3>
                            </label>
                            <div class="accordion-content">
                                <?php
                                $sql = "SELECT prozesagailua FROM produktua WHERE ProduktuMota_idProduktuMota=2 AND  prozesagailua IS NOT NULL GROUP BY prozesagailua";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo ' <input type="checkbox" id="' . $row['prozesagailua'] . '" name="' . $row['prozesagailua'] . '" value="' . $row['prozesagailua'] . '" />';
                                        echo '<label for="' . $row['prozesagailua'] . '">' . $row['prozesagailua'] . '</label><br>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li> <br>
                    <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check" id="item3">
                            <label class="accordion-title" for="item3">
                                <h3>Tamaina (pulgadaka):</h3>
                            </label>
                            <div class="accordion-content">
                                <?php
                                $sql = "SELECT tamaina FROM produktua WHERE ProduktuMota_idProduktuMota=2 AND  tamaina IS NOT NULL GROUP BY tamaina";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo ' <input type="checkbox" id="' . $row['tamaina'] . '" name="' . $row['tamaina'] . '" value="' . $row['tamaina'] . '" />';
                                        echo '<label for="' . $row['tamaina'] . '">' . $row['tamaina'] . '</label><br>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li><br>
                    <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check" id="item4">
                            <label class="accordion-title" for="item4">
                                <h3>Sistema eragilea:</h3>
                            </label>
                            <div class="accordion-content">
                                <?php
                                $sql = "SELECT sistemaEragilea FROM produktua WHERE ProduktuMota_idProduktuMota=2 AND  sistemaEragilea IS NOT NULL GROUP BY sistemaEragilea";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo ' <input type="checkbox" id="' . $row['sistemaEragilea'] . '" name="' . $row['sistemaEragilea'] . '" value="' . $row['sistemaEragilea'] . '" />';
                                        echo '<label for="' . $row['sistemaEragilea'] . '">' . $row['sistemaEragilea'] . '</label><br>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li> <br>
                    <li>
                        <div class="accordion-item">
                            <input type="checkbox" class="check" id="item5">
                            <label class="accordion-title" for="item5">
                                <h3>Prezioa:</h3>
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

                    <input class="botoiaez" type="reset" id="ezabatu" value="Ezabatu" />


                </form>
            </ul>
        </div>
        <div class="produktuakKat">
            <?php

            $sql = "SELECT idProduktua, irudia1, marka, modeloa, salmentaPrezioa FROM produktua where ProduktuMota_idProduktuMota=2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="produktuaKat" id="produktua' . $row['idProduktua'] . '">';
                    echo '<a href="produktua.php?produktuid=' .$row['idProduktua'] .'" class="prodIrudiak">';
                    echo '<img id="argazkia" src="irudiak/PRODUKTUAK/' . $row['irudia1'] . '" alt="Irudia ' . $row['idProduktua'] . '">';
                    echo '</a>';
                    echo '<p><b>Marka:</b> ' . $row['marka'] . '</p><br>';
                    echo '<p style="height:40px"><b>Modeloa:</b> ' . $row['modeloa'] . '</p>';
                    echo '<p><b>Prezioa:</b> ' . $row['salmentaPrezioa'] . '€</p><br>';
                    echo '<a class="saskira" href=""><i class="fa-solid fa-cart-plus"></i></a>';
                    echo '</div>';
                }
            } else {
                echo "Ez da produkturik aurkitu";
            }

            $conn->close();
            ?>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                function hautatutakoBaloreak(name) {
                    var baloreak = [];
                    $(`input[name="${name}[]"]:checked`).each(function () {
                        baloreak.push($(this).val());
                    });
                    return baloreak;
                }

                // Función para filtrar productos
                function produktuakFiltratu() {
                    var filtroak = {
                        modeloa: $('#mota').val(2),
                        marka: hautatutakoBaloreak('marka'),
                        prozesagailua: hautatutakoBaloreak('prozesagailua'),
                        tamaina: hautatutakoBaloreak('tamaina'),
                        sistemaEragilea: hautatutakoBaloreak('sistemaEragilea'),
                        prezioa: hautatutakoBaloreak('prezioa')
                    };

                    $.ajax({
                        url: 'filtroa.php',
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

                // Función para actualizar la lista de productos
                function produktuZerrendaBirkargatu(produktuak) {
                    var edukia = '';
                    if (produktuak.length === 0) {
                        edukia = '<div class="no-results">Ez dago produkturik parametro horiekin.</div>';
                    } else {
                        $.each(produktuak, function (index, produktua) {
                            edukia += `
                    <div class="produktuaKat" id="produktua${produktua.idProduktua}">
                        <a href="produktua.php?produktuid=${produktua.idProduktua}" class="prodIrudiak">
                            <img id="argazkia" src="irudiak/PRODUKTUAK/${produktua.irudia1}" alt="Irudia ${produktua.idProduktua}">
                        </a>
                        <p><b>Marka:</b> ${produktua.marka}</p><br>
                        <p style="height:40px"><b>Modeloa:</b> ${produktua.modeloa}</p>
                        <p><b>Prezioa:</b> ${produktua.salmentaPrezioa}€</p><br>
                        <a class="saskira" href=""><i class="fa-solid fa-cart-plus"></i></a>
                    </div>
                `;
                        });
                    }
                    $('.produktuakKat').html(edukia);
                }

                // Event listeners para todos los elementos del filtro
                $('input[name="marka[]"]').change(produktuakFiltratu);
                $('input[name="prozesagailua[]"]').change(produktuakFiltratu);
                $('input[name="tamaina[]"]').change(produktuakFiltratu);
                $('input[name="sistemaEragilea[]"]').change(produktuakFiltratu);
                $('input[name="prezioa[]"]').change(produktuakFiltratu);

                // Ejecutar el filtrado inicial
                produktuakFiltratu();
                
            });
        </script>

    <?php include 'footer.php'; ?>



</body>

</html>