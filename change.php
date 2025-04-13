<?php
session_start();
$is_logged_in = $_SESSION["ingelogt"] ?? false;
?>


<?php
include 'db.php';

// Toevoegen
if (isset($_POST['toevoegen'])) {
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $stmt = $pdo->prepare("INSERT INTO menukaart (naam, omschrijving, prijs) VALUES (?, ?, ?)");
    $stmt->execute([$naam, $omschrijving, $prijs]);
}

// Aanpassen
if (isset($_POST['aanpassen'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $stmt = $pdo->prepare("UPDATE menukaart SET naam = ?, omschrijving = ?, prijs = ? WHERE id = ?");
    $stmt->execute([$naam, $omschrijving, $prijs, $id]);
}

// Verwijderen
if (isset($_POST['verwijderen'])) {
    $id = $_POST['verwijder_id'];
    $stmt = $pdo->prepare("DELETE FROM menukaart WHERE id = ?");
    $stmt->execute([$id]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menukaart Beheren</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="container-header">
            <a href="index.php" class="tekst-header">Home</a>
            <a href="" class="tekst-header">Reserve</a>
            <a href="" class="tekst-header">Delivery</a>
        </nav>
        <img class="logo-header" src="images/Schermafbeelding 2025-04-03 102945.png" alt="Logo van café 23">
        <?php
        if (!$is_logged_in) {
            echo '<button class="login login-tekst">Login</button>';
        } else {
            echo '<a href="admin.php" class="login login-header login-tekst">Admin</a>';
        }
        ?>
    </header>

    <div class="body-change">
        <h1>Menukaart beheren</h1>

        <div class="toevoeg-aanpas-menu">
            <form method="POST" class="form-box">
                <h2 class="menu-kop-change">Nieuw gerecht toevoegen</h2>

                <label for="naam">Naam:</label>
                <input type="text" name="naam" class="input-box" required>

                <label for="omschrijving">Omschrijving:</label>
                <textarea name="omschrijving" class="input-box"></textarea>

                <label for="prijs">Prijs:</label>
                <input type="text" name="prijs" class="input-box" required>

                <button type="submit" name="toevoegen">Toevoegen</button>
            </form>

            <form method="POST" class="form-box">
                <h2 class="menu-kop-change">Bestaand gerecht aanpassen</h2>

                <label for="id">Gerecht ID:</label>
                <input type="number" name="id" class="input-box" required>

                <label for="naam">Nieuwe naam:</label>
                <input type="text" name="naam" class="input-box" required>

                <label for="omschrijving">Nieuwe omschrijving:</label>
                <textarea name="omschrijving" class="input-box"></textarea>

                <label for="prijs">Nieuwe prijs:</label>
                <input type="text" name="prijs" class="input-box" required>

                <button type="submit" name="aanpassen">Aanpassen</button>
            </form>
        </div>

        <div class="verwijder-box">
            <form method="POST" class="form-box">
                <h2 class="menu-kop-change">Gerecht verwijderen</h2>

                <label for="verwijder_id">Gerecht ID:</label>
                <input type="number" name="verwijder_id" class="input-box" required>

                <button type="submit" name="verwijderen">Verwijderen</button>
            </form>
        </div>

        <div class="tekst-menu-change">
            <h1>Menukaart</h1>
            <h2>Overzicht van gerechten</h2>
        </div>
        <div class="change-menu">

            <ul>
                <?php
                $stmt = $pdo->query("SELECT * FROM menukaart ORDER BY id ASC");
                while ($gerecht = $stmt->fetch()) {
                    echo "<li><strong>ID {$gerecht['id']}</strong> - {$gerecht['naam']} - <em>€{$gerecht['prijs']}</em><br>{$gerecht['omschrijving']}</li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <footer>
        <h1 class="footer-minitekst">© 2025 • Café 23</h1>
        <img class="logo-footer" src="images/Schermafbeelding 2025-04-03 102945.png" alt="Logo van café 23">
    </footer>

</body>

</html>