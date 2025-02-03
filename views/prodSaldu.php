<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>AI Market | Zure produktuak saldu</title>
    <link rel="icon" href="irudiak/IKONOAK/favicon_dark.svg" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="irudiak/IKONOAK/favicon_light.svg" media="(prefers-color-scheme: light)">
    <script src="https://kit.fontawesome.com/83f15f6aab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">
    </linkrel>
</head>

<body>
    <?php include 'header.php'; ?>
    
    <div class="formularioa">
        <div class="produktua">
            <h2 id="formularioa">Bete ezazu formularioa zure produktuaren xehetasunekin</h2>
            <br>
            <form action="/action_page.php">
                <label for="modeloa">Produktu mota:</label><br>
                <select name="modeloa" id="mota">
                    <option value="mugikorra">Mugikorra</option>
                    <option value="ordenagailua">Ordenagailua</option>
                    <option value="aurikularra">Aurkilarra</option>
                    <option value="monitorea">Monitorea</option>
                </select> <br>
                <label for="marka">Marka:</label><br>
                <input type="text" name="marka" id="marka" /><br>
                <label for="modeloa">Modeloa:</label><br>
                <input type="text" name="modeloa" id="modeloa" /><br>
                <label for="memoria">Memoria:</label><br>
                <input type="text" name="Memoria" id="memoria" /><br>
                <label for="kolorea">Kolorea:</label><br>
                <input type="color" name="kolorea" id="kolorea" /><br>
                <label for="erosketaData">Produktua erosi zenuen data:</label><br>
                <input type="date" name="erosketaData" id="erosketaData" /><br>
                <br>
                <input type="submit" class="botoiak1" value="Bidali">
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>


</body>

</html>

</body>

</html>