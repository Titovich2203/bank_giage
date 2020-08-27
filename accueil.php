<?php
session_start();
require_once 'models/employeBD.php';
require_once 'models/profilBD.php';
require_once 'models/compteBD.php';
require_once 'models/ClientBD.php';
require_once 'models/operationBD.php';

    if (empty($_SESSION)){
        header("location:/bank_giage");
    }

    include_once 'header.php';
    include_once 'topbar.php';

    if (isset($_GET['p'])){
        switch ($_GET['p']){
            case 'accueil':
                include_once 'bienvenue.php';
                break;
            case 'gProfil':
                $profils = getProfils();
                include_once 'views/profil/indexProfil.php';
                break;
            case 'ajoutProfil':
                include_once 'views/profil/addProfil.php';
                break;
            case 'modifierProfil':
                $profil = findProfilById($_GET['id']);
                include_once 'views/profil/updateProfil.php';
                break;
            case 'gEmploye':
                $employes = getEmployes();
                include_once 'views/employe/indexEmploye.php';
                break;
            case 'ajoutEmploye':
                $numeroGenere = genererNumero();
                $profils = getProfils();
                include_once 'views/employe/addEmploye.php';
            case 'modifierEmploye':
                //$numeroGenere = genererNumero();
                $emp = findEmployeById($_GET['id']);
                $profils = getProfils();
                include_once 'views/employe/updateEmploye.php';
                break;
            case 'gCompte':
                $comptes = getAllCompteAvecClients();
                include_once 'views/compte/indexCompte.php';
                break;
            case 'gOperation':
                $operations = listOp();
                include_once 'views/operation/indexOperation.php';
                break;
            case 'ajoutCompte':
                $numero = genererNumeroCompte();
                include_once 'views/compte/addCompte.php';
                break;
            case 'selectCompte':
                //$numero = genererNumeroCompte();
                include_once 'views/operation/selectCompte.php';
                break;
            case 'selectCompte':
                //$numero = genererNumeroCompte();
                include_once 'views/operation/selectCompte.php';
                break;
            case 'newOp':
                //$numero = genererNumeroCompte();
                $types = getAllTypeOp();
                $operations = listOpByIdCompte($_GET['id']);
                $compte = getCompteById($_GET['id']);
                include_once 'views/operation/addOperation.php';
                break;
            case 'gClient':
                $clients = getAllClientsWithNbCp();
                include_once 'views/client/indexClient.php';
                break;
            case 'addCompteToClient':
                if(isset($_GET['id'])) {
                    $client = getClientById($_GET['id']);
                    if($client != null) {
                        $numero = genererNumeroCompte();
                        include_once 'views/compte/addCompteToClient.php';
                    }
                }
                break;

        }
    } else{
        include_once 'bienvenue.php';
    }

include 'footer.php';
if (isset($_GET['p'])){
    switch ($_GET['p']) {

        case 'gEmploye':
            ?>
            <script src="/bank_giage/public/jquery/employeDom.js"></script>
            <?php
            break;
    }

    }
