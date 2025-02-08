<?php
$servername = "localhost";
$username = "root";  // změňte podle vašeho nastavení
$password = "";      // změňte podle vašeho nastavení
$dbname = "zakazky_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>