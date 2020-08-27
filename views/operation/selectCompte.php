<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Recherche compte</h2>
        </div>
        <div class="card-body">
            <form action="/bank_giage/controllers/compteCtrl.php" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <label for="">NUMERO : </label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="num" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="btnSearchCompte" class="btn btn-primary btn-sm" value="Rechercher">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_GET['erreur'])){
    echo '<div class="h2 text-center blue-text container col-md-6">Compte inexistant!</div>';

}