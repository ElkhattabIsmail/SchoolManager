<?php
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = htmlspecialchars($_POST["id"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);

    $sql = "INSERT INTO eleves (id, nom, prenom)
            VALUES (:id, :nom, :prenom)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id" => $id,
        ":nom" => $nom,
        ":prenom" => $prenom
    ]);

    header("Location: index.php");
    exit;
}
?>

<form method="POST">
    <input type="text" name="id" placeholder="id" required>
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <button type="submit">Ajouter</button>
</form>