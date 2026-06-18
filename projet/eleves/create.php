<?php
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $matricule = htmlspecialchars($_POST["matricule"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);

    $sql = "INSERT INTO eleves (matricule, nom, prenom)
            VALUES (:matricule, :nom, :prenom)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":matricule" => $matricule,
        ":nom" => $nom,
        ":prenom" => $prenom
    ]);

    header("Location: index.php");
    exit;
}
?>

<form method="POST">
    <input type="text" name="matricule" placeholder="Matricule" required>
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <button type="submit">Ajouter</button>
</form>