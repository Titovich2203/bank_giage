<nav class="navbar navbar-expand-lg navbar-dark blue darken-4 mt-2">
    <a class="navbar-brand" href="#"><span class="text-center"><img style="width: 30%" src="/bank_giage/images/logoSmall.png" alt=""></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto text-center font-weight-bold h6">
            <li class="nav-item active">
                <a class="nav-link" href="?p=accueil">Accueil
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a <?= (strtolower($_SESSION['profil']) == 'chef agence') ? '' : 'hidden' ?>
                        class="nav-link" href="?p=gProfil">Gestion Profils</a>
            </li>
            <li class="nav-item">
                <a <?= (strtolower($_SESSION['profil']) == 'chef agence')
                    ? '' : 'hidden' ?> class="nav-link" href="?p=gEmploye">Gestion Employés</a>
            </li>
            <li class="nav-item">
                <a <?= (strtolower($_SESSION['profil']) == 'chef agence'
                    || strtolower($_SESSION['profil']) == 'gestionnaire compte' )
                    ? '' : 'hidden' ?>
                        class="nav-link" href="?p=gClient">Gestion Clients</a>
            </li>
            <li class="nav-item">
                <a <?= (strtolower($_SESSION['profil']) == 'chef agence'
                    || strtolower($_SESSION['profil']) == 'gestionnaire compte' )
                    ? '' : 'hidden' ?> class="nav-link" href="?p=gCompte">Gestion Comptes</a>
            </li>
            <li class="nav-item">
                <a <?= (strtolower($_SESSION['profil']) == 'chef agence'
                    || strtolower($_SESSION['profil']) == 'caissier' )
                    ? '' : 'hidden' ?> class="nav-link" href="?p=gOperation">Gestion Opérations</a>
            </li>

        </ul>
        <span class="navbar-text white-text">
            <a href="/bank_giage/controllers/employeCtrl.php?btnDecon" class="btn btn-danger btn-sm">Se déconnecter</a>
        </span>
    </div>
</nav>