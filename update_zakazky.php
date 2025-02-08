<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $reseni = $conn->real_escape_string($_POST['reseni']);
    $cena = (float)$_POST['cena'];
    $stav = $conn->real_escape_string($_POST['stav']);

    $datum_dokonceni = ($stav == 'dokoncena') ? "datum_dokonceni = CURRENT_TIMESTAMP" : "datum_dokonceni = NULL";

    $sql = "UPDATE zakazky 
            SET reseni = '$reseni', 
                cena = $cena, 
                stav = '$stav',
                $datum_dokonceni
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: detail_zakazky.php?id=$id");
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }
}
?>