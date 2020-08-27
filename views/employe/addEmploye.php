<div class="container mt-5">

    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-header blue lighten-4 text-center text-uppercase h4 font-weight-bold">
                Nouvel employe
            </div>
            <div class="card-body">
                <form action="/bank_giage/controllers/employeCtrl.php" method="post">
                    <div class="row mt-4">
                        <div class="col-md-2 text-left">
                            <label for="numero" class="h5">NUMERO</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" value="<?= $numeroGenere ?>" class="form-control" name="numero"  readonly   >
                        </div>

                        <div class="col-md-2 text-left">
                            <label for="profil" class="h5">PROFIL</label>
                        </div>
                        <div class="col-md-4">
                            <select name="profil" class="form-control">
                                <option value="" disabled selected>-- Choisir le profil --</option>
                                <?php
                                foreach ($profils as $p){
                                    ?>
                                    <option value="<?= $p['idProfil'] ?>"><?= $p['nomProfil'] ?></option>
                                    <?php 
                                }
                                
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2 text-left">
                            <label for="nom" class="h5">NOM</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nom">
                        </div>
                        <div class="col-md-2 text-left">
                            <label for="prenom" class="h5">PRENOM</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="prenom">
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col-md-2 text-left">
                            <label for="tel" class="h5">TELEPHONE</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="tel">
                        </div>
                        <div class="col-md-2 text-left">
                            <label for="adresse" class="h5">ADRESSE</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="adresse">
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col-md-2 text-left">
                            <label for="login" class="h5">LOGIN</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="login">
                        </div>
                        <div class="col-md-2 text-left">
                            <label for="profil" class="h5">PASSWORD</label>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="mdp">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-5 mt-4">
                            <input type="submit" name="btnAddEmploye" class="btn btn-md btn-info">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<?php
    if(isset($_GET['reussi'])){
        echo '<div class="h2 text-center container col-md-6">Employe ajouté avec succès !</div>';

    }
    if(isset($_GET['echec'])){
        echo '<div class="h2 text-center red-text container col-md-6">Echec d\'ajout !</div>';

    }