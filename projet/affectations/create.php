<?php
require_once "../config/database.php";

$ens = $pdo->query("SELECT * FROM enseignants")->fetchAll();
$classes = $pdo->query("SELECT * FROM classes")->fetchAll();
$matieres = $pdo->query("SELECT * FROM matieres")->fetchAll();

if ($_POST) {
    $pdo->prepare(
        "INSERT INTO affectations (enseignant_id, classe_id, matiere_id, annee_scolaire)
         VALUES (?, ?, ?, ?)"
    )->execute([
        $_POST["enseignant"],
        $_POST["classe"],
        $_POST["matiere"],
        $_POST["annee"]
    ]);

    header("Location: index.php");
}
?>

<form method="POST">
    <select name="enseignant">
        <?php foreach ($ens as $e): ?>
            <option value="<?= $e["id"] ?>"><?= $e["nom"] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="classe">
        <?php foreach ($classes as $c): ?>
            <option value="<?= $c["id"] ?>"><?= $c["nom_classe"] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="matiere">
        <?php foreach ($matieres as $m): ?>
            <option value="<?= $m["id"] ?>"><?= $m["nom_matiere"] ?></option>
        <?php endforeach; ?>
    </select>

    <input name="annee" placeholder="2025-2026">

    <button>Affecter</button>
</form>