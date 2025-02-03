<?php
// Obtener el término de búsqueda del formulario
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']); // Evitar inyección de código
    $query = strtolower($query); // Convertir a minúsculas para evitar problemas de mayúsculas/minúsculas

    // Lista de archivos HTML donde se realizará la búsqueda
    $archivos = ['HASIERA.php', 'KATALOGOA.php', 'NOR GARA.php', 'KONTAKTUA.php', 'PROD_SALDU.php'];

    // Variable para almacenar los resultados
    $resultados = [];

    // Recorrer cada archivo y buscar el término
    foreach ($archivos as $archivo) {
        if (file_exists($archivo)) {
            // Obtener el contenido del archivo
            $contenido = file_get_contents($archivo);
            $contenido_lower = strtolower($contenido); // Convertir el contenido a minúsculas

            // Comprobar si el término de búsqueda aparece en el contenido
            if (strpos($contenido_lower, $query) !== false) {
                // Si se encuentra el término, agregar el archivo a los resultados
                $resultados[] = $archivo;
            }
        }
    }

    // Mostrar los resultados
    if (!empty($resultados)) {
        echo "<h2>Resultados para: '$query'</h2>";
        echo "<ul>";
        foreach ($resultados as $resultado) {
            echo "<li><a href='$resultado'>$resultado</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>No se encontraron resultados para: '$query'</h2>";
    }
} else {
    echo "<h2>No se proporcionó ningún término de búsqueda.</h2>";
}
?>
