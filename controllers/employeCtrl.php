<?php
session_start();
    require_once '../models/employeBD.php';

    if (isset($_POST['btnConnecter'])){
        extract($_POST);
        $user = verifierConnexion($login,$mdp);

        if($user != NULL){
            $_SESSION['id'] = $user['idEmploye'];
            $_SESSION['nom'] = $user['nomEmp'];
            $_SESSION['prenom'] = $user['prenomEmp'];
            $_SESSION['profil'] = $user['nomProfil'];

            header("location:/bank_giage/accueil.php");
        }
        else
        {
            header("location:/bank_giage?erreur");
        }
    }

    if(isset($_GET['btnDecon'])){
        session_unset();
        header("location:/bank_giage");
    }

    if(isset($_POST['btnAddEmploye']))
    {
        extract($_POST);
        if(ajoutEmploye($numero,$nom,$prenom,$tel,$adresse,$profil,$login,$mdp) > 0)
        {
            header('location:/bank_giage/accueil.php?p=ajoutEmploye&reussi');
        }
        else
        {
            header('location:/bank_giage/accueil.php?p=ajoutEmploye&echec');
        }
    }

    if(isset($_POST['btnUpdateEmploye']))
    {
        extract($_POST);
        if(updateEmploye($numero,$nom,$prenom,$tel,$adresse,$profil,$login,$mdp) > 0)
        {
            header('location:/bank_giage/accueil.php?p=gEmploye');
        }
        else
        {
            header('location:/bank_giage/accueil.php?p=gEmploye');
        }
    }