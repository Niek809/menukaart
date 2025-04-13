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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = trim($_POST['username'] ?? '');
    $passInput = trim($_POST['password'] ?? '');

    if (!empty($userInput) && !empty($passInput)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindValue(':username', $userInput);
        $stmt->bindValue(':password', $passInput);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['ingelogt'] = true;
            $_SESSION['user'] = $userInput;
            header("Location: admin.php");
            exit;
        }

        header("Location: index.php?error=1");
        exit;
    }
}
