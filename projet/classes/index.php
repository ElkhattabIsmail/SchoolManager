<?php
require_once "../config/database.php";

$rows = $pdo->query("SELECT * FROM classes")->fetchAll();
?>

<h2>Classes</h2>

<a href="create.php">+ Ajouter Classe</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nom Classe</th>
    <th>Niveau</th>
    <th>Capacité</th>
    <th>Année scolaire</th>
    <th>Actions</th>
</tr>

<?php foreach ($rows as $r): ?>
<tr>
    <td><?= $r["id"] ?></td>
    <td><?= $r["nom_classe"] ?></td>
    <td><?= $r["niveau"] ?></td>
    <td><?= $r["capacite_max"] ?></td>
    <td><?= $r["annee_scolaire"] ?></td>
    <td>
        <a href="edit.php?id=<?= $r["id"] ?>">Edit</a>
        <a href="delete.php?id=<?= $r["id"] ?>" onclick="return confirm('Supprimer ?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>