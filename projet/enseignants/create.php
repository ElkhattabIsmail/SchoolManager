<?php
require_once "../config/database.php";

if ($_POST) {
    $stmt = $pdo->prepare(
        "INSERT INTO enseignants (matricule, nom, email)
         VALUES (?, ?, ?)"
    );

    $stmt->execute([
        $_POST["matricule"],
        $_POST["nom"],
        $_POST["email"]
    ]);

    header("Location: index.php");
}
?>

<form method="POST">
    <input name="matricule" placeholder="Matricule">
    <input name="nom" placeholder="Nom">
    <input name="email" placeholder="Email">
    <button>Ajouter</button>
</form>