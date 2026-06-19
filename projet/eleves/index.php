<?php
require_once "../config/database.php";

$stmt = $pdo->query("SELECT * FROM eleves");
$eleves = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des élèves</h2>

<a href="create.php">+ Ajouter élève</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($eleves as $e): ?>
    <tr>
        <td><?= $e["id"] ?></td>
        <td><?= $e["nom"] ?></td>
        <td><?= $e["prenom"] ?></td>
        <td>
            <a href="edit.php?id=<?= $e["id"] ?>">Edit</a>
            <a href="delete.php?id=<?= $e["id"] ?>" onclick="return confirm('Supprimer ?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>