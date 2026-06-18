<?php
require_once "../config/database.php";

// جلب ID
$id = $_GET["id"] ?? null;

if (!$id) {
    die("ID invalide");
}

// حذف affectation
$stmt = $pdo->prepare("DELETE FROM affectations WHERE id = ?");
$stmt->execute([$id]);

// الرجوع للقائمة
header("Location: index.php");
exit;
?>