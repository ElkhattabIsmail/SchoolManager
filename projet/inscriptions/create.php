<?php
require_once "../config/database.php";

$eleves = $pdo->query("SELECT * FROM eleves")->fetchAll();
$classes = $pdo->query("SELECT * FROM classes")->fetchAll();

if ($_POST) {
    $stmt = $pdo->prepare(
        "INSERT INTO inscriptions (eleve_id, classe_id, annee_scolaire)
         VALUES (?, ?, ?)"
    );

    $stmt->execute([
        $_POST["eleve"],
        $_POST["classe"],
        $_POST["annee"]
    ]);

    header("Location: index.php");
}
?>

<form method="POST">
    <select name="eleve">
        <?php foreach ($eleves as $e): ?>
            <option value="<?= $e["id"] ?>">
                <?= $e["nom"] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="classe">
        <?php foreach ($classes as $c): ?>
            <option value="<?= $c["id"] ?>">
                <?= $c["nom_classe"] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input name="annee" placeholder="2025-2026">

    <button>Inscrire</button>
</form>