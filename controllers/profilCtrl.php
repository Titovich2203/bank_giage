<?php
    require_once '../models/profilBD.php';

    if(isset($_GET['idProfilSup'])){
        $id = $_GET['idProfilSup'];
        if(supprimerProfil($id) == 1){
            header("location:/bank_giage/accueil.php?p=gProfil");
        }
    }

    if(isset($_POST['btnAddProfil'])){
        extract($_POST);
        if(ajouterProfil($nom) == 1){
            header("location:/bank_giage/accueil.php?p=ajoutProfil&reussi");
        }
    }

    if (isset($_POST['btnUpProfil'])){
        extract($_POST);
        if(modifierProfil($id,$nom) == 1){
            header("location:/bank_giage/accueil.php?p=gProfil");
        }
    }