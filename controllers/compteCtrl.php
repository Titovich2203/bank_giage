<?php
session_start();
require_once '../models/compteBD.php';
require_once '../models/operationBD.php';
require_once '../models/clientBD.php';

    if(isset($_POST['btnAddCompte'])){
        extract($_POST);
        //var_dump($_POST);
        $dateCreation = date("d-m-Y");
        $idCli = insererClient($cni, $nom, $prenom, $adresse,  $tel);
        if($idCli > 0) {
            $idGestCompte = $_SESSION['id'];
            $idCompte = ajoutCompte($numero, $dateCreation, $solde, $idCli, $idGestCompte);
            if ($idCompte > 0) {
                $idTypeOperation = getTypeOpByNom("depot")['id'];
                $numeroOp = genererNumeroOperation();
                if (depot($numeroOp, $dateCreation, $solde, $idCompte, $idTypeOperation, $idGestCompte) > 0) {
                    header('location:/bank_giage/accueil.php?p=ajoutCompte&reussi');
                } else {
                    header('location:/bank_giage/accueil.php?p=ajoutCompte&echec');
                }
            }
        }
        else{
            header('location:/bank_giage/accueil.php?p=ajoutCompte&echec');
        }
    }
    if(isset($_POST['btnAddCompteToClient'])){
        extract($_POST);
        //var_dump($_POST);
        $dateCreation = date("d-m-Y");
        $idCli = getClientByCni($cni)['id'];
        if($idCli > 0) {
            $idGestCompte = $_SESSION['id'];
            $idCompte = ajoutCompte($numero, $dateCreation, $solde, $idCli, $idGestCompte);
            if ($idCompte > 0) {
                $idTypeOperation = getTypeOpByNom("depot")['id'];
                $numeroOp = genererNumeroOperation();
                if (depot($numeroOp, $dateCreation, $solde, $idCompte, $idTypeOperation, $idGestCompte) > 0) {
                    header('location:/bank_giage/accueil.php?p=gClient&reussi');
                } else {
                    header('location:/bank_giage/accueil.php?p=gClient&echec');
                }
            }
        }
        else{
            header('location:/bank_giage/accueil.php?p=gClient&echec');
        }
    }
    if (isset($_POST['btnSearchCompte']))
    {
        extract($_POST);
        $cp = findCompteByNumero($num);
        if($cp == null)
        {
            header('location:/bank_giage/accueil.php?p=selectCompte&erreur');
        }
        else
        {
            header('location:/bank_giage/accueil.php?p=newOp&id='.$cp['id']);
        }
    }
