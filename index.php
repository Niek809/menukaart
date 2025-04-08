<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="above-box">
        <img class="logo" src="images/Schermafbeelding 2025-02-27 082815.png" alt="Logo van café 23">
        <button class="login login-tekst">Login</button>
    </div>

    <div class="home-cafe-tekst">
        <span class="home-tekst">Bemmel's latest unique bar</span>
    </div>

    <div class="box-button-home">
        <a class="button-home button-tekst" href="menu.php">Menu</a>
        <a class="button-home button-tekst">Table reserve</a>
        <a class="button-home button-tekst">Delivery</a>
        <a class="button-home button-tekst" href="https://www.google.nl/maps/search/bemmel+centrum/@51.893131,5.8994502,15.5z?entry=ttu&g_ep=EgoyMDI1MDMwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank">Our Location</a>
    </div>

    <a href="https://www.instagram.com/cafe23bemmel/" target="_blank" class="sociaal">
        <img class="insta-logo" src="images/instagram-logo-instagram-icon-transparent-free-png.webp" alt="Instagram logo">Follow us @Cafe23Bemmel
    </a>



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