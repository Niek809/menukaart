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
        <a href="reserve.php" class="tekst-header">Reserve</a>
        <a href="about.php" class="tekst-header">Delivery</a>
    </nav>
    <img class="logo-header" src="images/Schermafbeelding 2025-04-03 102945.png" alt="Logo van café 23">

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['username'] == 'admin'): ?>
        <!-- Toon Admin link wanneer ingelogd als admin -->
        <a href="admin.php" class="login login-header login-tekst">Admin</a>
    <?php else: ?>
        <!-- Toon Login knop als niet ingelogd -->
        <button class="login login-header login-tekst" onclick="window.location.href='login.php'">Login</button>
    <?php endif; ?>
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

</body>
</html>