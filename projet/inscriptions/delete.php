<?php
require_once "../config/database.php";

$pdo->prepare("DELETE FROM inscriptions WHERE id=?")
    ->execute([$_GET["id"]]);

header("Location: index.php");