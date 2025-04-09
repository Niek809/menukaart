<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menukaart</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<header>
    <nav class="container-header">
        <a href="index.php" class="tekst-header">Home</a>
        <a href="" class="tekst-header">Reserve</a>
        <a href="" class="tekst-header">Delivery</a>
    </nav>
    <img class="logo-header" src="images/Schermafbeelding 2025-04-03 102945.png" alt="Logo van café 23">
        <button class="login login-header login-tekst">Login</button>
</header>

<h1>Menukaart</h1>

<h2>Overzicht van gerechten</h2>
<ul>
<?php
$stmt = $pdo->query("SELECT * FROM menukaart ORDER BY id ASC");
while ($gerecht = $stmt->fetch()) {
    echo "<li><strong>{$gerecht['naam']}</strong>: {$gerecht['omschrijving']} - <em>€{$gerecht['prijs']}</em> </li>";
}
?>
</ul>

<footer>
    <h1 class="footer-minitekst">© 2025 • Café 23</h1>
    <img class="logo-footer" src="images/Schermafbeelding 2025-04-03 102945.png" alt="Logo van café 23">
</footer>

    <!-- Loginpaneel -->
    <div id="loginModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="login-tekst">Login</h2>
                <form action="login.php" method="POST">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Wachtwoord:</label>
                    <input type="password" id="password" name="password" required>
                    <button class="login-tekst-paneel" type="submit">Inloggen</button>
                </form>
            </div>
        </div>

        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p style="color: red;">Geen geldige inloggegevens. Probeer het opnieuw.</p>
        <?php endif; ?>

        <!-- JavaScript -->
        <script src="js/script.js"></script>

</body>
</html>