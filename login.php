<?php
session_start();

// 🔧 Vul hier jouw databasegegevens in
$host = "localhost";  // Vaak 'localhost' of een specifieke server
$dbname = "mydatabase";  // Vervang dit met de naam van je database
$username = "admin"; // Database gebruiker
$password = "wachtwoord123"; // Database wachtwoord

try {
    // Maak een databaseverbinding
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Haal ingevoerde gegevens op
        $user = $_POST["username"];
        $pass = $_POST["password"];

        // Controleer of de gebruikersnaam bestaat in de database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $user);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Vergelijk het ingevoerde wachtwoord met het gehashte wachtwoord uit de database
            if (password_verify($pass, $result["password"])) {
                $_SESSION["username"] = $user;
                echo "Login succesvol!";
            } else {
                echo "Fout: Ongeldige gebruikersnaam of wachtwoord.";
            }
        } else {
            echo "Fout: Gebruiker bestaat niet.";
        }
    }
} catch (PDOException $e) {
    echo "❌ Databasefout: " . $e->getMessage();
}
?>
