<?php
require_once "../config/database.php";

if ($_POST) {
    $pdo->prepare(
        "INSERT INTO matieres (nom_matiere) VALUES (?)"
    )->execute([$_POST["nom"]]);

    header("Location: index.php");
}
?>

<form method="POST">
    <input name="nom" placeholder="Nom matière">
    <button>Ajouter</button>
</form>