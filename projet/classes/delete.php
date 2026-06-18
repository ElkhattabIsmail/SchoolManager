<?php
require_once "../config/database.php";

$id = $_GET["id"];

// optional safety check
$pdo->prepare("DELETE FROM classes WHERE id=?")->execute([$id]);

header("Location: index.php");
exit;