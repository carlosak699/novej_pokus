<?php require_once 'db_connect.php'; 

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT * FROM zakazky WHERE id = $id";
$result = $conn->query($sql);
$zakazka = $result->fetch_assoc();

if (!$zakazka) {
    die("Zakázka nenalezena");
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail zakázky #<?php echo $id; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Detail zakázky #<?php echo $id; ?></h1>
        
        <div class="detail-zakazky">
            <h2>Informace o klientovi</h2>
            <p><strong>Jméno:</strong> <?php echo htmlspecialchars($zakazka['jmeno_klienta']); ?></p>
            <p><strong>Adresa:</strong> <?php echo htmlspecialchars($zakazka['adresa_klienta']); ?></p>
            <p><strong>Telefon:</strong> <?php echo htmlspecialchars($zakazka['telefon']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($zakazka['email']); ?></p>

            <h2>Informace o zakázce</h2>
            <p><strong>Adresa zakázky:</strong> <?php echo htmlspecialchars($zakazka['adresa_zakazky']); ?></p>
            <p><strong>Popis problému:</strong> <?php echo htmlspecialchars($zakazka['popis_problemu']); ?></p>

            <h2>Řešení zakázky</h2>
            <form action="update_zakazky.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                <div class="form-group">
                    <label for="reseni">Provedené práce:</label>
                    <textarea id="reseni" name="reseni"><?php echo htmlspecialchars($zakazka['reseni']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="cena">Cena (Kč):</label>
                    <input type="number" id="cena" name="cena" step="0.01" value="<?php echo $zakazka['cena']; ?>">
                </div>

                <div class="form-group">
                    <label for="stav">Stav zakázky:</label>
                    <select id="stav" name="stav">
                        <option value="nova" <?php if($zakazka['stav'] == 'nova') echo 'selected'; ?>>Nová</option>
                        <option value="zpracovava_se" <?php if($zakazka['stav'] == 'zpracovava_se') echo 'selected'; ?>>Zpracovává se</option>
                        <option value="dokoncena" <?php if($zakazka['stav'] == 'dokoncena') echo 'selected'; ?>>Dokončena</option>
                    </select>
                </div>

                <button type="submit">Uložit změny</button>
            </form>
        </div>

        <a href="index.php" class="btn-zpet">Zpět na seznam</a>
    </div>
</body>
</html>