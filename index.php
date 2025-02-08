<?php require_once 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa zakázek</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Správa zakázek</h1>
        
        <h2>Nová zakázka</h2>
        <form action="pridat_zakazku.php" method="POST">
            <div class="form-group">
                <label for="jmeno_klienta">Jméno klienta:</label>
                <input type="text" id="jmeno_klienta" name="jmeno_klienta" required>
            </div>

            <div class="form-group">
                <label for="adresa_klienta">Adresa klienta:</label>
                <textarea id="adresa_klienta" name="adresa_klienta" required></textarea>
            </div>

            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="tel" id="telefon" name="telefon">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="adresa_zakazky">Adresa zakázky:</label>
                <textarea id="adresa_zakazky" name="adresa_zakazky" required></textarea>
            </div>

            <div class="form-group">
                <label for="popis_problemu">Popis problému:</label>
                <textarea id="popis_problemu" name="popis_problemu" required></textarea>
            </div>

            <button type="submit">Přidat zakázku</button>
        </form>

        <h2>Seznam zakázek</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Klient</th>
                    <th>Adresa zakázky</th>
                    <th>Stav</th>
                    <th>Akce</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM zakazky ORDER BY datum_vytvoreni DESC";
                $result = $conn->query($sql);

                if ($result) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['jmeno_klienta']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['adresa_zakazky']) . "</td>";
                        echo "<td>" . $row['stav'] . "</td>";
                        echo "<td><a href='detail_zakazky.php?id=" . $row['id'] . "'>Detail</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>