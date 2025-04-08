<?php
$host = 'db';
$db   = 'mydatabase';
$user = 'user';
$pass = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
} catch (PDOException $e) {
    echo "Fout bij verbinden met database: " . $e->getMessage();
    exit;
}
