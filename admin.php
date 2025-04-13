<?php
session_start();

if (!isset($_SESSION['ingelogt']) || $_SESSION['ingelogt'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <div class="above-box">
        <img class="logo" src="images/Schermafbeelding 2025-02-27 082815.png" alt="Logo van café 23">
        <a href="logout.php" class="logout login-tekst">Logout</a>
    </div>

    <div class="home-cafe-tekst">
        <span class="home-tekst">Welkom admin</span>
    </div>

    <div class="box-button-home">
        <a class="button-home button-tekst" href="menu.php">Menu</a>
        <a class="button-home button-tekst">Table reserve</a>
        <a class="button-home button-tekst">Delivery</a>
        <a class="button-home button-tekst" href="https://www.google.nl/maps/search/bemmel+centrum/@51.893131,5.8994502,15.5z?entry=ttu&g_ep=EgoyMDI1MDMwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank">Our Location</a>
        <a class="button-home button-tekst" href="change.php">Menu change</a>
    </div>

    <a href="https://www.instagram.com/cafe23bemmel/" target="_blank" class="sociaal">
        <img class="insta-logo" src="images/instagram-logo-instagram-icon-transparent-free-png.webp" alt="Instagram logo">Follow us @Cafe23Bemmel
    </a>

</body>

</html>