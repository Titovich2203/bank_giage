<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Nouveau Profil</h2>
        </div>
        <div class="card-body">
            <form action="/bank_giage/controllers/profilCtrl.php" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <label for="">NOM : </label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="nom" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="btnAddProfil" class="btn btn-primary btn-sm" value="Enregistrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    if(isset($_GET['reussi'])){
        echo '<div class="h2 text-center blue-text container col-md-6">Profil ajouté avec succès !</div>';

    }