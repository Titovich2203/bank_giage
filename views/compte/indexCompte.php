<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 offset-9">
            <a href="/bank_giage/accueil.php?p=ajoutCompte" class="btn btn-sm btn-primary">Ajouter</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2>Liste des comptes</h2>
                </div>
                <div class="card-body">
                    <table class="table table-info">
                        <tr>
                            <th>NUMERO</th>
                            <th>DATE CREATION</th>
                            <th>SOLDE</th>
                            <th>NOM CLIENT</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        <?php
                        foreach ($comptes as $cp){
                            if($cp['etat'] == 1) {
                                ?>
                                <tr>
                                    <td><?= $cp['numero'] ?></td>
                                    <td><?= $cp['dateCreation'] ?></td>
                                    <td><?= $cp['solde'] ?></td>
                                    <td><?= $cp['nom'] ?> <?= $cp['prenom'] ?></td>
                                    <td colspan="2">
                                        <!--                                    <a href="/bank_giage/accueil.php?p=modifierEmploye&id=-->
                                        <?//= $cp['id']
                                        ?><!--" class="btn btn-sm btn-warning">Modifier</a>-->
                                        <a href="views/compte/indexCompte.php?idCompte=<?= $cp['id'] ?>"
                                           class="btn btn-sm btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_GET['idCompte'])){
    require_once '../../models/compteBD.php';
    require_once '../../models/operationBD.php';

    if (changeEtat($_GET['idCompte']) == 1){
        deleteOpByIdCompte($_GET['idCompte']);
        header("location:/bank_giage/accueil.php?p=gCompte");
    }
}
