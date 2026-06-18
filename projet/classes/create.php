<?php
require_once "../config/database.php";

if ($_POST) {

    $sql = "INSERT INTO classes (nom_classe, niveau, capacite_max, annee_scolaire)
            VALUES (?, ?, ?, ?)";

    $pdo->prepare($sql)->execute([
        $_POST["nom_classe"],
        $_POST["niveau"],
        $_POST["capacite"],
        $_POST["annee"]
    ]);

    header("Location: index.php");
}
?>

<h2>Ajouter Classe</h2>

<form method="POST">
    <input name="nom_classe" placeholder="Nom classe" required>
    <input name="niveau" placeholder="Niveau" required>
    <input name="capacite" type="number" placeholder="Capacité max" required>
    <input name="annee" placeholder="2025-2026" required>

    <button>Ajouter</button>
</form>