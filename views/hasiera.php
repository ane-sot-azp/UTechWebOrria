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
    <img class="deskontuak" src="../public/irudiak\DESKONTUAK\Deskontuak.png" alt="deskontuak">
    <div class="produktuak">
        <h1>Azken produktuak</h1>
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
                echo "Ez da produkturik aurkitu";
            }

            $conn->close();
            ?>
        </div>
    <div class="produktuak">
        <h1>Albisteak</h1>
    </div>
    <div class="albiste">
        <div class="albisteak1">
            <div class="albisteIrudia">
                <img src="../public/irudiak/ALBISTEAK/20241023124623_adimen-artifiziala-dls-zu_amp_w1200.jpg" width="100%">
            </div>
            <div class="izenburua">
                <h2>EAEko entitateen % 12k darabilte Adimen Artifiziala, Euskadin hasiberria den arloa</h2>
            </div>
            <div class="laburpena">
                <h5>Euskadiko Adimen Artifizialaren Zentroak (BAIC) teknologia horren lehen diagnostikoa
                    egin du. Datuen arabera, gutxienez 89 enpresa ari dira AA garatzen, eta eskariari erantzuteko nahikoa ez
                    badira ere, 908 pertsonak dute arlo horren inguruko prestakuntzaren bat.</h5>
            </div>
            <div class="albistea">
                <p>Autonomia Erkidegoan (EAE), entitateen %12,2k Adimen Artifizialeko (AA) sistemak erabiltzen
                    dituzte, sektoreak hastapenetan egon arren hazkunde nabarmena erakusten du. Euskadiko Adimen
                    Artifizialaren Zentroak (BAIC) 2023ko diagnostiko bat argitaratu du, non AAren ekosistemaren egoera
                    aztertzen den. BAIC, 2021ean sortua, 700 eragilek osatzen dute, erakunde publiko, enpresa eta
                    prestakuntza-zentroen artean.</p>

                <p>Txostenaren arabera, EAE Estatuaren batez bestekoaren gainetik dago, eta AAren erabilera Erresuma
                    Batua,
                    Frantzia edo Alemaniaren parekoa da. Administrazio publikoetan erabilera handiagoa da (%16,4), eta
                    enpresen artean 89k AA soluzioak eskaintzen dituzte, iaz 105 milioi euroko fakturazioa lortuz.</p>

                <p>Bestalde, AA hezkuntza eskaintza gora egiten ari da, urtero 900 pertsona espezializatuz, baina
                    oraindik
                    ez dira nahikoa eskaerari erantzuteko. Ikerketa alorrean 1.200 profesional ari dira lanean, eta 21
                    Datuak Prozesatzeko Zentro eta 6 errendimendu altuko konputazio-zentro daude Euskadin.</p>

                <p>Mikel Jauregi Industria sailburuak AA "iraultza historikoa" dela azpimarratu du, eta euskal
                    industriaren
                    nazioarteko lehiakortasuna hobetzeko tresna gisa kokatu du.</p>
            </div>
        </div>
        <div class="albisteak2">
            <div class="albisteIrudia">
                <img src="../public/irudiak/ALBISTEAK/20241018105413_urko-esnaola_foto610x342.jpg" width="100%">
            </div>
            <div class="izenburua">
                <h2>Urko Esnaola, Tecnalia: "Robotak edonork programatzea, hori da erronka nagusia"</h2>
            </div>
            <div class="laburpena">
                <h5>Tecnaliaren robot berrienak ezagutu ditugu ikerketa zentroak Gipuzkoako Zientzia eta Teknolgia
                    Parkean
                    duen egoitzan. Urko Esnaola robotika-proiektuetarako zuzendaria: "Irudimenik aurreratuenak ere ez
                    daki
                    robotika noraino hel litekeen".</h5>
            </div>
            <div class="albistea">
                <p>The Business Research Companyren proiekzioen arabera, nazioarteko robotika industriak 120.000 milioi
                    euro
                    eragingo du aurten eta 2028an bikoiztu egingo da negozio-bolumena. Europako Batasunean bakarrik,
                    %68ko
                    hazkundea espero dute sektorean aurten eta Euskal Herrian Tecnaliada ikerketa robotikoaren
                    erreferenteetako bat. Ikerketa zentroak Gipuzkoako Zientzia eta Teknolgia Parkean duen egoitzan
                    hartu
                    gaitu Urko Esnaola Tecnaliako robotika-proiektuetarako zuzendariak.</p>

                <p>Hiru robot aurkeztu dizkigu Esnaolak: Robotnik enpresarekin batera garatu duten eta aeronautikarako
                    piezak leuntzen dituen Thomas robota, errealitate birtualeko betaurrekak erabiliz leuntzea
                    automatizatzeko gai den beso robotikoa, eta NextStage, bitrozeramikak era autonomoan eta ahots
                    aginduz
                    muntatzeko gai den humanoidea (baita euskaraz ere).</p>

                <p>Azken urteetan urrats handiak egin ditugu", azaldu du Esnaolak, "eta oso toki onean gaude nazioarteko
                    lehian". Etorkizuneko erronka "erraztasuna" dela nabarmendu du Esnaolak, robota "edonork" programa
                    dezan: "Inteligentzian egin behar dugu lan, bisio eta adimen artifizialean, gizaki eta roboten
                    arteko
                    komunikazioa erraz dezagun". "Aukeraz beteriko" etorkizuna marraztu du Tecnaliako
                    robotika-proiektuetarako zuzendariak: "Irudimenik aurreratuenak ere ez daki robotika noraino hel
                    litekeen".</p>
            </div>
        </div>
    </div>

    


</body>

</html>