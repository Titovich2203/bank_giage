<?php
session_start();
require_once '../models/compteBD.php';
require_once '../models/operationBD.php';
require_once '../models/clientBD.php';

    if(isset($_POST['btnAddOp']))
    {
        extract($_POST);
        $dateCreation = date("d-m-Y");
        $numeroOp = genererNumeroOperation();
        $idGestCompte = $_SESSION['id'];
        $idTypeOperation = getTypeOpByNom($typeOperation)['id'];
        $idCompte = $_GET['idCompte'];

        $ok = false;

        if($typeOperation == 'depot') {
            if (depot($numeroOp, $dateCreation, $montant, $idCompte, $idTypeOperation, $idGestCompte) > 0) {
                $ok = true;
            }
        }
        if($typeOperation == 'retrait')
        {
            if (retrait($numeroOp, $dateCreation, $montant, $idCompte, $idTypeOperation, $idGestCompte) > 0) {
                $ok = true;
            }
        }
        //die();
        if($ok == true)
        {
            header('location:/bank_giage/accueil.php?p=newOp&id='.$idCompte.'&succes');
        }
        else
        {
            header('location:/bank_giage/accueil.php?p=newOp&id='.$idCompte.'&erreur');
        }

    }