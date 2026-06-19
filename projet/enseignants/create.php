<?php
require_once "../config/database.php";

if ($_POST) {
    $stmt = $pdo->prepare(
        "INSERT INTO enseignants (id, nom, prenom)
         VALUES (?, ?, ?)"
    );

    $stmt->execute([
        $_POST["id"],
        $_POST["nom"],
        $_POST["prenom"]
    ]);

    header("Location: index.php");
}
?>

<form method="POST">
    <input name="id" placeholder="id">
    <input name="nom" placeholder="Nom">
    <input name="prenom" placeholder="prenom">
    <button>Ajouter</button>
</form>