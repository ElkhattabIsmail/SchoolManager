<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB credentials (match projet/config/database.php)
$host = 'localhost';
$user = 'root';
$pass = '';

try {
    // connect without selecting a database so CREATE DATABASE works
    $pdo = new PDO("mysql:host=$host;charset=utf8", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $sqlFile = __DIR__ . '/schema.sql';
    if (!file_exists($sqlFile)) {
        throw new Exception('schema.sql introuvable: ' . $sqlFile);
    }

    $sql = file_get_contents($sqlFile);
    // split statements by semicolon and execute non-empty ones
    $stmts = array_filter(array_map('trim', explode(';', $sql)));
    foreach ($stmts as $s) {
        if ($s === '') continue;
        $pdo->exec($s);
    }

    echo "Import SQL terminé avec succès.";
} catch (Exception $e) {
    echo "Erreur lors de l'import: " . $e->getMessage();
}

// Warning: remove or protect this file after use.
