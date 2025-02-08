<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmeno_klienta = $conn->real_escape_string($_POST['jmeno_klienta']);
    $adresa_klienta = $conn->real_escape_string($_POST['adresa_klienta']);
    $telefon = $conn->real_escape_string($_POST['telefon']);
    $email = $conn->real_escape_string($_POST['email']);
    $adresa_zakazky = $conn->real_escape_string($_POST['adresa_zakazky']);
    $popis_problemu = $conn->real_escape_string($_POST['popis_problemu']);

    $sql = "INSERT INTO zakazky (jmeno_klienta, adresa_klienta, telefon, email, adresa_zakazky, popis_problemu) 
            VALUES ('$jmeno_klienta', '$adresa_klienta', '$telefon', '$email', '$adresa_zakazky', '$popis_problemu')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }
}
?>