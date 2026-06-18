<?php
require_once "../config/database.php";

$id = $_GET["id"];

// get old data
$stmt = $pdo->prepare("SELECT * FROM classes WHERE id=?");
$stmt->execute([$id]);
$c = $stmt->fetch();

if ($_POST) {

    $sql = "UPDATE classes
            SET nom_classe=?, niveau=?, capacite_max=?, annee_scolaire=?
            WHERE id=?";

    $pdo->prepare($sql)->execute([
        $_POST["nom_classe"],
        $_POST["niveau"],
        $_POST["capacite"],
        $_POST["annee"],
        $id
    ]);

    header("Location: index.php");
}
?>

<h2>Modifier Classe</h2>

<form method="POST">
    <input name="nom_classe" value="<?= $c["nom_classe"] ?>">
    <input name="niveau" value="<?= $c["niveau"] ?>">
    <input name="capacite" value="<?= $c["capacite_max"] ?>">
    <input name="annee" value="<?= $c["annee_scolaire"] ?>">

    <button>Modifier</button>
</form>