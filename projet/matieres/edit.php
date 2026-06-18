<?php
require_once "../config/database.php";

$id = $_GET["id"];

$d = $pdo->prepare("SELECT * FROM matieres WHERE id=?");
$d->execute([$id]);
$data = $d->fetch();

if ($_POST) {
    $pdo->prepare("UPDATE matieres SET nom_matiere=? WHERE id=?")
        ->execute([$_POST["nom"], $id]);

    header("Location: index.php");
}
?>

<form method="POST">
    <input name="nom" value="<?= $data["nom_matiere"] ?>">
    <button>Modifier</button>
</form>