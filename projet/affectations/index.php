<?php
require_once "../config/database.php";
include "../includes/header.php";

// جلب affectations مع أسماء العلاقات
$sql = "
SELECT 
    a.id,
    a.annee_scolaire,
    e.nom AS enseignant_nom,
    e.prenom AS enseignant_prenom,
    c.nom_classe,
    m.nom_matiere
FROM affectations a
JOIN enseignants e ON a.enseignant_id = e.id
JOIN classes c ON a.classe_id = c.id
JOIN matieres m ON a.matiere_id = m.id
ORDER BY a.id DESC
";

$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();
?>

<h2>Liste des affectations</h2>

<a href="create.php">+ Nouvelle affectation</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Enseignant</th>
    <th>Classe</th>
    <th>Matière</th>
    <th>Année scolaire</th>
    <th>Actions</th>
</tr>

<?php foreach ($rows as $r): ?>
<tr>
    <td><?= $r["id"] ?></td>
    <td><?= $r["enseignant_nom"] . " " . $r["enseignant_prenom"] ?></td>
    <td><?= $r["nom_classe"] ?></td>
    <td><?= $r["nom_matiere"] ?></td>
    <td><?= $r["annee_scolaire"] ?></td>
    <td>
        <a href="delete.php?id=<?= $r["id"] ?>" 
           onclick="return confirm('Supprimer cette affectation ?')">
            Delete
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<?php include "../includes/footer.php"; ?>