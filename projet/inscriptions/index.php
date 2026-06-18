<?php
require_once "../config/database.php";
include "../includes/header.php";

// جلب inscriptions مع أسماء التلميذ و القسم
$sql = "
SELECT 
    i.id,
    i.annee_scolaire,
    e.nom AS eleve_nom,
    e.prenom AS eleve_prenom,
    c.nom_classe
FROM inscriptions i
JOIN eleves e ON i.eleve_id = e.id
JOIN classes c ON i.classe_id = c.id
ORDER BY i.id DESC
";

$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();
?>

<h2>Liste des inscriptions</h2>

<a href="create.php">+ Nouvelle inscription</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Élève</th>
    <th>Classe</th>
    <th>Année scolaire</th>
    <th>Actions</th>
</tr>

<?php foreach ($rows as $r): ?>
<tr>
    <td><?= $r["id"] ?></td>
    <td><?= $r["eleve_nom"] . " " . $r["eleve_prenom"] ?></td>
    <td><?= $r["nom_classe"] ?></td>
    <td><?= $r["annee_scolaire"] ?></td>
    <td>
        <a href="delete.php?id=<?= $r["id"] ?>" onclick="return confirm('Supprimer ?')">
            Delete
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<?php include "../includes/footer.php"; ?>