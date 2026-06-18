<?php
include "includes/header.php";
?>

<div class="container">

    <h1>Gestion Scolaire</h1>
    <p>Bienvenue dans le système de gestion scolaire.</p>

    <h2>Menu Principal</h2>

    <table>
        <tr>
            <th>Module</th>
            <th>Accès</th>
        </tr>

        <tr>
            <td>Élèves</td>
            <td><a class="btn btn-add" href="eleves/index.php">Ouvrir</a></td>
        </tr>

        <tr>
            <td>Enseignants</td>
            <td><a class="btn btn-add" href="enseignants/index.php">Ouvrir</a></td>
        </tr>

        <tr>
            <td>Classes</td>
            <td><a class="btn btn-add" href="classes/index.php">Ouvrir</a></td>
        </tr>

        <tr>
            <td>Matières</td>
            <td><a class="btn btn-add" href="matieres/index.php">Ouvrir</a></td>
        </tr>

        <tr>
            <td>Inscriptions</td>
            <td><a class="btn btn-add" href="inscriptions/index.php">Ouvrir</a></td>
        </tr>

        <tr>
            <td>Affectations</td>
            <td><a class="btn btn-add" href="affectations/index.php">Ouvrir</a></td>
        </tr>

    </table>

</div>

<?php
include "includes/footer.php";
?>