<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
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

<div class="body-menukaart">
<h2>Menukaart overzicht</h2>
<ul>
<?php
$stmt = $pdo->query("SELECT * FROM menukaart ORDER BY id ASC");
while ($gerecht = $stmt->fetch()) {
    echo "<li><strong>ID {$gerecht['id']} - {$gerecht['naam']}</strong>: {$gerecht['omschrijving']}</li>";
}
?>
</ul>
</div>

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