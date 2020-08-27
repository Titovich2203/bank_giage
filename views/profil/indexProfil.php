<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 offset-7">
            <a href="/bank_giage/accueil.php?p=ajoutProfil" class="btn btn-sm btn-primary">Ajouter</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header bg-info">
                    <h2>Liste des profils</h2>
                </div>
                <div class="card-body">
                    <table class="table table-info">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        <?php
                            foreach ($profils as $p){
                                ?>
                                <tr>
                                    <td><?= $p['idProfil'] ?></td>
                                    <td><?= $p['nomProfil'] ?></td>
                                    <td colspan="2">
                                        <a href="/bank_giage/accueil.php?p=modifierProfil&id=<?= $p['idProfil'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                                        <a href="/bank_giage/controllers/profilCtrl.php?idProfilSup=<?= $p['idProfil']?>" class="btn btn-sm btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                         <?php   }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
