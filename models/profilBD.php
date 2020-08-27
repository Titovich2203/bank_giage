<?php
    require_once 'bdd.php';

    function getProfils(){
        global $base;
        $req = "SELECT * FROM profil ORDER BY idProfil";
        return $base->query($req)->fetchAll();
    }

    function supprimerProfil($id){
        global $base;

        $req = "DELETE FROM profil WHERE idProfil = $id";
        return $base->exec($req);
    }

    function ajouterProfil($nom){
        global $base;
         return $base->exec("INSERT INTO profil(nomProfil) VALUES ('$nom')");
    }

    function findProfilById($id){
        global $base;

        return $base->query("SELECT * FROM profil WHERE idProfil = $id")->fetch();
    }

    function modifierProfil($id,$nom){
        global $base;

        return $base->exec("UPDATE profil SET nomProfil = '$nom' WHERE idProfil = $id");
    }
