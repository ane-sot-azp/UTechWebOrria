<?php
require_once("../src/db.php");
$conn = konexioaEgin();

// Obtener todos los parámetros del formulario
$mota = isset($_GET['mota']) ? $_GET['mota'] : '';
$markak = isset($_GET['marka']) ? $_GET['marka'] : array();
$prozesagailua = isset($_GET['prozesagailua']) ? $_GET['prozesagailua'] : array();
$tamaina = isset($_GET['tamaina']) ? $_GET['tamaina'] : array();
$sistemaEragilea = isset($_GET['sistemaEragilea']) ? $_GET['sistemaEragilea'] : array();
$prezioa = isset($_GET['prezioa']) ? $_GET['prezioa'] : array();

// Construir la consulta SQL
$sql = "SELECT idProduktua, irudia1, marka, modeloa, salmentaPrezioa FROM produktua WHERE 1=1";

// Agregar condiciones según los filtros seleccionados
if ($mota) {
    $sql .= " AND ProduktuMota_idProduktuMota = '$mota'";
}
if (!empty($markak)) {
    $marksStr = implode("','", $markak);
    $sql .= " AND marka IN ('$marksStr')";
}
if (!empty($prozesagailua)) {
    $prozStr = implode("','", $prozesagailua);
    $sql .= " AND prozesagailua IN ('$prozStr')";
}
if (!empty($tamaina)) {
    $tamainaStr = implode("','", $tamaina);
    $sql .= " AND tamaina IN ('$tamainaStr')";
}
if (!empty($sistemaEragilea)) {
    $sistemaStr = implode("','", $sistemaEragilea);
    $sql .= " AND sistemaEragilea IN ('$sistemaStr')";
}
if (!empty($prezioa)) {
    foreach ($prezioa as $tartea) {
        list($min, $max) = explode('-', $tartea);
        $sql .= " AND salmentaPrezioa BETWEEN '$min' AND '$max'";
    }
}

// $sql .= " LIMIT 27";

$result = $conn->query($sql);

// Preparar la erantzuna en formato JSON
$erantzuna = array();
while ($row = $result->fetch_assoc()) {
    $erantzuna[] = $row;
}

header('Content-Type: application/json');
echo json_encode($erantzuna);

$conn->close();