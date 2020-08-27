<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 offset-9">
            <a href="/bank_giage/accueil.php?p=ajoutCompte" class="btn btn-sm btn-primary">Nouveau</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2>Liste des clients</h2>
                </div>
                <div class="card-body">
                    <table class="table table-info">
                        <tr>
                            <th>CNI</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>ADRESSE</th>
                            <th>TEL</th>
                            <th>NOMBRE DE COMPTES</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        <?php
                        if(isset($clients)){
                            foreach ($clients as $c){
                                    ?>
                                    <tr>
                                        <td><?= $c['cni'] ?></td>
                                        <td><?= $c['nom'] ?></td>
                                        <td><?= $c['prenom'] ?></td>
                                        <td><?= $c['adresse'] ?></td>
                                        <td><?= $c['tel'] ?></td>
                                        <td><?= $c['nbCp'] ?></td>
                                        <td colspan="2">

                                            <a href="?p=addCompteToClient&id=<?= $c['id'] ?>" class="btn btn-sm btn-success">Nouveau compte</a>
                                            <a href="views/client/indexClient.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                    <?php
                            }}
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_GET['id'])) {
    require_once '../../models/clientBD.php';
    require_once '../../models/compteBD.php';
    require_once '../../models/operationBD.php';

    $client = getClientById($_GET['id']);
    if($client != null)
    {
        $comptes = getComptesByIdClient($client['id']);
        foreach ($comptes as $c)
        {
            reallyDeleteOpByIdCompte($c['id']);
        }
        deleteClientAndComptes($client['id']);
    }
   header("location:/bank_giage/accueil.php?p=gClient");
}
