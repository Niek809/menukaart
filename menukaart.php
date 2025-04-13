<?php
session_start();
$is_logged_in = $_SESSION["ingelogt"] ?? false;
?>

<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menukaart</title>
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
            echo '<button class="login login-header login-tekst">Login</button>';
        } else {
            echo '<a href="admin.php" class="login login-header login-tekst">Admin</a>';
        }
        ?>
    </header>

    <div class="body-change">
        <div class="tekst-menukaart-change">
            <h1>Menukaart</h1>
        </div>
        <div class="change-menu">
            <ul class="menu-list">
                <?php
                $stmt = $pdo->query("SELECT * FROM menukaart ORDER BY id ASC");
                while ($gerecht = $stmt->fetch()) {
                    echo "<li class='menu-item'>";
                    echo "<div class='menu-row'>";
                    echo "<span class='gerecht-naam'>{$gerecht['naam']}</span>";
                    echo "€" . number_format($gerecht['prijs'], 2);
                    echo "</div>";
                    echo "<div class='gerecht-omschrijving'>{$gerecht['omschrijving']}</div>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>

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