<?php
    include_once 'header.php';
?>

<div class="container mt-4">
    <div class="col-md-4 offset-5">
        <span class="text-center"><img src="/bank_giage/images/logoSmall.png" alt=""></span>
    </div>
</div>

<!-- Material form login -->
<div class="card mt-4 container col-md-4">

    <h5 class="card-header aqua-gradient white-text text-center py-4">
        <strong>AUTHENTIFICATION</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form method="post" action="/bank_giage/controllers/employeCtrl.php" class="text-center" style="color: #757575;" action="#!">

            <!-- Email -->
            <div>
                <label for="materialLoginFormEmail">Nom d'Utilisateur</label>
                <input type="text" name="login" required id="materialLoginFormEmail" class="form-control">
            </div>

            <!-- Password -->
            <div>
                <label for="materialLoginFormPassword">Mot de Passe</label>
                <input type="password" name="mdp"  required id="materialLoginFormPassword" class="form-control">
            </div>


            <!-- Sign in button -->
            <button class="btn blue-gradient btn-rounded my-4 waves-effect z-depth-0" type="submit" name="btnConnecter">Se Connecter</button>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form login -->
<?php
    if (isset($_GET['erreur'])){
        echo '<div class="h2 text-center red-text container col-md-6">Login ou Mot de Passe incorrect !</div>';
    }
?>
<?php
    include_once 'footer.php';
?>
