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
<div id="section2" class="section">
    <div id="section2Kont">
        <h2 class=""><?= trans("erosketak") ?></h2>
        <?php
        $conn = konexioaEgin();
        if (!$conn) {
            echo "dberror";
        }
        $id = $_SESSION['id'];
        $sql = "SELECT idEskaera, fraZkia, totala, egoera, data, faktura FROM eskaera WHERE Bezeroa_idBezeroa=$id ORDER BY data DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div id="eskaera' . $row["idEskaera"] . '" class="eskaera"> ';
                echo '<table class="eskaerak" width="100%">';
                echo '<thead>';
                echo '<tr><th colspan="2">' . trans("dataEsk") . ' ' . $row["data"] . '</th>';
                echo '<th colspan="2">' . trans("frazkiaesk") . ' ' . $row["fraZkia"] . '</th>';
                echo '<th>' . trans("totalaEsk") . ' ' . $row["totala"] . ' €</th>';
                echo '<th>' . trans("faktura") . '<a href="' . $row["faktura"] . '"><i class="fa-solid fa-file-invoice"></i></a></th>';

                echo '</tr></thead><tbody>';
                $sql1 = "SELECT idProduktua, kopurua, prezioa, data FROM eskaeraproduktua WHERE fraZkia='" . $row["fraZkia"] . "'";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $sql2 = "SELECT idProduktua, marka, modeloa, irudia1 FROM produktua WHERE idProduktua=" . $row1["idProduktua"];
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td> </td>';
                                echo '<td><a href="produktua.php?produktuid=' . $row2["idProduktua"] . '"><img src="../public/irudiak/PRODUKTUAK' . $row2["irudia1"] . '" alt="produktua" width="100px" height="100px"></a></td>';
                                echo '<td>' . $row2["marka"] . '</td>';
                                echo '<td>' . $row2["modeloa"] . '</td>';
                                echo '<td>' . $row1["kopurua"] . '</td>';
                                echo '<td>' . $row1["prezioa"] . ' €</td>';
                                echo '</tr>';
                            }
                        }
                    }
                }echo '</tbody></table>';
                echo '</div>';
            }
            
        }




        
        

        ?>
    </div>

</div>

</body>

</html>