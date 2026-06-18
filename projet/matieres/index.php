<?php
require_once "../config/database.php";
include "../includes/header.php";

$rows = $pdo->query("SELECT * FROM matieres")->fetchAll();
?>

<h2>Matières</h2>
<a href="create.php">+ Ajouter</a>

<ul>
<?php foreach ($rows as $r): ?>
    <li>
        <?= $r["nom_matiere"] ?>
        <a href="edit.php?id=<?= $r["id"] ?>">Edit</a>
        <a href="delete.php?id=<?= $r["id"] ?>">Delete</a>
    </li>
<?php endforeach; ?>
</ul>

<?php include "../includes/footer.php"; ?>