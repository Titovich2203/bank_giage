<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 offset-9">
            <a href="/bank_giage/accueil.php?p=ajoutCompte" class="btn btn-sm btn-primary">Ajouter</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Recherche employe</h2>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" id="num" class="form-control" placeholder="Numero">
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="nom" class="form-control" placeholder="Nom complet">
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="login" class="form-control" placeholder="Login">
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="adresse" class="form-control" placeholder="Adresse">
                    </div>
                </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2>Liste des employés</h2>
                </div>
                <div class="card-body">
                    <table class="table table-info">
                        <tr>
                            <th>NUMERO</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>LOGIN</th>
                            <th>ADRESSE</th>
                            <th>TELEPHONE</th>
                            <th>PROFIL</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        <tbody id="tableEmploye">
                        <?php
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    if (isset($_GET['idEmploye'])){
        require_once '../../models/employeBD.php';

        if (supprimerEmploye($_GET['idEmploye']) == 1){

            header("location:/bank_giage/accueil.php?p=gEmploye");
        }
    }
