<?php
require_once "../config/database.php";
include "../includes/header.php";

// جلب ID
$id = $_GET["id"] ?? null;

if (!$id) {
    die("ID invalide");
}

// جلب البيانات القديمة
$stmt = $pdo->prepare("SELECT * FROM enseignants WHERE id = ?");
$stmt->execute([$id]);
$ens = $stmt->fetch();

if (!$ens) {
    die("Enseignant introuvable");
}

// UPDATE
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = htmlspecialchars($_POST["id"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);

    $sql = "UPDATE enseignants 
            SET id = ?, nom = ?, prenom = ?
            WHERE id = ?";

    $pdo->prepare($sql)->execute([
        $id,
        $nom,
        $prenom,
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<h2>Modifier Enseignant</h2>

<form method="POST">
    <input type="text" name="id" value="<?= $ens["id"] ?>" required>
    <input type="text" name="nom" value="<?= $ens["nom"] ?>" required>
    <input type="prenom" name="prenom" value="<?= $ens["prenom"] ?>" required>

    <button type="submit">Modifier</button>
</form>

<?php include "../includes/footer.php"; ?>