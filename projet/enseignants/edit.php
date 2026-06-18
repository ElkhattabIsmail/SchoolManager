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

    $matricule = htmlspecialchars($_POST["matricule"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);

    $sql = "UPDATE enseignants 
            SET matricule = ?, nom = ?, email = ?
            WHERE id = ?";

    $pdo->prepare($sql)->execute([
        $matricule,
        $nom,
        $email,
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<h2>Modifier Enseignant</h2>

<form method="POST">
    <input type="text" name="matricule" value="<?= $ens["matricule"] ?>" required>
    <input type="text" name="nom" value="<?= $ens["nom"] ?>" required>
    <input type="email" name="email" value="<?= $ens["email"] ?>" required>

    <button type="submit">Modifier</button>
</form>

<?php include "../includes/footer.php"; ?>