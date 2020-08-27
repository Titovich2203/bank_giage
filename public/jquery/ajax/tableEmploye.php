<?php
session_start();
require_once '../../../models/employeBD.php';
$employes = filtrerEmployes($_GET['num'], $_GET['nom'], $_GET['login'], $_GET['adresse']);
//echo $_GET['num'];
foreach ($employes as $emp){
    ?>
    <tr>
        <td><?= $emp['numeroEmp'] ?></td>
        <td><?= $emp['nomEmp'] ?></td>
        <td><?= $emp['prenomEmp'] ?></td>
        <td><?= $emp['login'] ?></td>
        <td><?= $emp['adresseEmp'] ?></td>
        <td><?= $emp['telEmp'] ?></td>
        <td><?= $emp['nomProfil'] ?></td>
        <td colspan="2">
            <a href="/bank_giage/accueil.php?p=modifierEmploye&id=<?= $emp['idEmploye'] ?>" class="btn btn-sm btn-warning">Modifier</a>
            <a <?= ($_SESSION['id'] == $emp['idEmploye']) ? 'hidden' : '' ?> href="views/employe/indexEmploye.php?idEmploye=<?= $emp['idEmploye']?>" class="btn btn-sm btn-danger">Supprimer</a>
        </td>
    </tr>
<?php   }
?>