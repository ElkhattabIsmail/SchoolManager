<?php
require_once "../config/database.php";
include "../includes/header.php";

$stmt = $pdo->query("SELECT * FROM enseignants");
$rows = $stmt->fetchAll();
?>

<h2>Enseignants</h2>
<a href="create.php">+ Ajouter</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Matricule</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Actions</th>
</tr>

<?php foreach ($rows as $r): ?>
<tr>
    <td><?= $r["id"] ?></td>
    <td><?= $r["matricule"] ?></td>
    <td><?= $r["nom"] ?></td>
    <td><?= $r["email"] ?></td>
    <td>
        <a href="edit.php?id=<?= $r["id"] ?>">Edit</a>
        <a href="delete.php?id=<?= $r["id"] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php include "../includes/footer.php"; ?>