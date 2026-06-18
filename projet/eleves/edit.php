<?php
require_once "../config/database.php";

$id = $_GET["id"];

// Récupérer ancien data
$stmt = $pdo->prepare("SELECT * FROM eleves WHERE id = ?");
$stmt->execute([$id]);
$eleve = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $matricule = htmlspecialchars($_POST["matricule"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);

    $sql = "UPDATE eleves 
            SET matricule = ?, nom = ?, prenom = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$matricule, $nom, $prenom, $id]);

    header("Location: index.php");
}
?>

<form method="POST">
    <input type="text" name="matricule" value="<?= $eleve['matricule'] ?>">
    <input type="text" name="nom" value="<?= $eleve['nom'] ?>">
    <input type="text" name="prenom" value="<?= $eleve['prenom'] ?>">
    <button type="submit">Modifier</button>
</form>