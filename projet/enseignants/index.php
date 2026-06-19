<?php
require_once "../config/database.php";


$stmt = $pdo->query("SELECT * FROM enseignants");
$rows = $stmt->fetchAll();
?>


<?php include "../includes/footer.php"; ?>