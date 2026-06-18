<?php
require_once "../config/database.php";

$id = $_GET["id"];

$stmt = $pdo->prepare("DELETE FROM eleves WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>