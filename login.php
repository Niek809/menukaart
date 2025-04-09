<?php
session_start();

$servername = "db";
$username = "user";
$password = "password";
$database = "mydatabase";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage() . "<br>Controleer of de database bestaat en of de gebruiker de juiste rechten heeft.");
}

$stmt = $pdo->query("SHOW TABLES LIKE 'users'");
$tableExists = $stmt->rowCount() > 0;

if (!$tableExists) {
    die("Fout: De tabel 'users' bestaat niet in de database. Zorg ervoor dat de database correct is ingesteld.");
}

// Verwerking van de inlog
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userInput = trim($_POST['username'] ?? '');
    $passInput = trim($_POST['password'] ?? '');

    if (!empty($userInput) && !empty($passInput)) {
        if ($userInput === "admin" && $passInput === "wachtwoord123") {
            $_SESSION['user'] = $userInput;
            header("Location: admin.php");
            exit;
        }

        // Zoek de gebruiker in de database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindValue(':username', $userInput);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Controleer of het wachtwoord correct is
            if (password_verify($passInput, $user['password_hash'])) {
                $_SESSION['user'] = $userInput;
                header("Location: index.php");
                exit;
            }
        }

        // Foutmelding bij mislukte login
        header("Location: index.php?error=1");
        exit;
    }
}
?>

<?php

// Veronderstel dat je een gebruikersnaam en wachtwoord in de database hebt gecontroleerd
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check of de logingegevens correct zijn
    if ($username == 'admin' && $password == 'wachtwoord123') {
        // Sessie starten voor de admin
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = 'admin'; // Sla de gebruikersnaam op in de sessie

        // Redirect naar de adminpagina
        header('Location: admin.php');
        exit;
    } else {
        // Toon een foutmelding als de login niet succesvol is
        echo 'Onjuiste gebruikersnaam of wachtwoord';
    }
}
?>