<?php
include 'db.php';

// Toevoegen
if (isset($_POST['toevoegen'])) {
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $stmt = $pdo->prepare("INSERT INTO menukaart (naam, omschrijving) VALUES (?, ?)");
    $stmt->execute([$naam, $omschrijving]);
    
    // Zorg ervoor dat de header wordt aangeroepen vóór enige HTML-output
    header("Location: menu.php");
    exit;
}

// Aanpassen
if (isset($_POST['aanpassen'])) {
    $id = $_POST['id'];
    $naam = $_POST['nieuwe_naam'];
    $omschrijving = $_POST['nieuwe_omschrijving'];
    $stmt = $pdo->prepare("UPDATE menukaart SET naam = ?, omschrijving = ? WHERE id = ?");
    $stmt->execute([$naam, $omschrijving, $id]);
    header("Location: menu.php");
    exit;
}

// Verwijderen
if (isset($_POST['verwijderen'])) {
    $id = $_POST['verwijder_id'];
    $stmt = $pdo->prepare("DELETE FROM menukaart WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menukaart Beheren</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<header>
    <nav class="container-header">
        <a href="index.php" class="tekst-header">Home</a>
        <a href="reserve.php" class="tekst-header">Reserve</a>
        <a href="about.php" class="tekst-header">Delivery</a>
    </nav>
    <img class="logo-header" src="images/Schermafbeelding 2025-04-03 102945.png" alt="Logo van café 23">
    <button class="login login-header login-tekst">Login</button>
</header>

<h1>Menukaart beheren</h1>

<h2>Nieuw gerecht toevoegen</h2>
<form method="POST">
    Naam: <input type="text" name="naam" required><br>
    Omschrijving: <textarea name="omschrijving" required></textarea><br>
    <button type="submit" name="toevoegen">Toevoegen</button>
</form>

<h2>Bestaand gerecht aanpassen</h2>
<form method="POST">
    Gerecht ID: <input type="number" name="id" required><br>
    Nieuwe naam: <input type="text" name="nieuwe_naam" required><br>
    Nieuwe omschrijving: <textarea name="nieuwe_omschrijving" required></textarea><br>
    <button type="submit" name="aanpassen">Aanpassen</button>
</form>

<h2>Gerecht verwijderen</h2>
<form method="POST">
    Gerecht ID: <input type="number" name="verwijder_id" required><br>
    <button type="submit" name="verwijderen">Verwijderen</button>
</form>

<hr>



<footer>
    <h1 class="footer-minitekst">© 2025 • Café 23</h1>
    <img class="logo-footer" src="images/Schermafbeelding 2025-04-03 102945.png" alt="Logo van café 23">
</footer>

<h2>Menukaart overzicht</h2>
<ul>
<?php
$stmt = $pdo->query("SELECT * FROM menukaart ORDER BY id ASC");
while ($gerecht = $stmt->fetch()) {
    echo "<li><strong>ID {$gerecht['id']} - {$gerecht['naam']}</strong>: {$gerecht['omschrijving']}</li>";
}
?>
</ul>

</body>
</html>