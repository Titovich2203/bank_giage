<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 offset-9">
            <a href="/bank_giage/accueil.php?p=selectCompte" class="btn btn-sm btn-primary">Operations d'un compte</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2>Liste des operations</h2>
                </div>
                <div class="card-body">
                    <table class="table table-info">
                        <tr>
                            <th>NUMERO OP</th>
                            <th>DATE OP</th>
                            <th>MONTANT</th>
                            <th>TYPE</th>
                            <th>NUM COMPTE</th>
                            <th>NOM GEST</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        <?php
                        if(isset($operations)){
                        foreach ($operations as $op){
                            if($op['etatOp'] == 1) {
                                $cp = getCompteById($op['idCompte']);
                                ?>
                                <tr>
                                    <td><?= $op['numero'] ?></td>
                                    <td><?= $op['dateOperation'] ?></td>
                                    <td><?= $op['montant'] ?></td>
                                    <td><?= $op['type'] ?></td>
                                    <td><?= $cp['numero'] ?></td>
                                    <td><?= $op['nomEmp'] ?> <?= $op['prenomEmp'] ?></td>
                                    <td colspan="2">
                                        <a
                                            <?php
                                                if($op['type'] == "depot")
                                                {
                                                    if($cp['solde'] - $op['montant'] < 500)
                                                    {
                                                        echo 'hidden';
                                                    }
                                                }
                                            ?> href="views/operation/indexOperation.php?idOperation=<?= $op['idO'] ?>&type=<?= $op['type'] ?>&mnt=<?= $op['montant'] ?>" class="btn btn-sm btn-danger">Annuler</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }}
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_GET['idOperation']) && isset($_GET['type']) && isset($_GET['mnt']) ){
    require_once '../../models/operationBD.php';

    if(delete($_GET['idOperation'], $_GET['type'], $_GET['mnt']) == 1)
    {
        header("location:/bank_giage/accueil.php?p=gOperation");
    }
}
