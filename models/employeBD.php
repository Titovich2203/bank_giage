<?php
    require_once 'bdd.php';

    function genererNumero(){
        global $base;

        $req = "SELECT MAX(idEmploye) FROM employe";
        $resultat = $base->query($req)->fetch();
        $id = $resultat[0] + 1;

        return 'BG_EMP_'.date('dmY').'_'.$id;

    }

    function verifierConnexion($login,$mdp){
        $req = "SELECT * FROM employe,profil WHERE login='$login' AND 
                password = '$mdp' AND idProfilF = idProfil";
        global $base;
       return $base->query($req)->fetch();

    }

    #retourne la liste des employés de la BD
    function getEmployes(){
        $req = "SELECT * FROM employe, profil WHERE idProfilF = idProfil";
        global $base;

        return $base->query($req)->fetchAll();
    }

    #retourne la liste des employés de la BD filtré
    function filtrerEmployes($num, $nom, $login, $adresse){
        $resultat = getEmployes();
        $employes = $resultat;
            //echo $num;
            if($num != "")
            {

                $employes = array_filter($employes, function ($var, $k) use ($num){
                    return (strpos(strtoupper($var['numeroEmp']), strtoupper($num)) != false);
                },ARRAY_FILTER_USE_BOTH);
            }
            if($login != "")
            {
                $employes = array_filter($employes, function ($var, $k) use ($login){
                    return (strpos(strtoupper($var['login']), strtoupper($login))!= false);
                },ARRAY_FILTER_USE_BOTH);
            }
            if($adresse != "")
            {
                $employes = array_filter($employes, function ($var, $k) use ($adresse){
                    return (strpos(strtoupper($var['adresseEmp']), strtoupper($adresse)) != false);
                },ARRAY_FILTER_USE_BOTH);
            }
            if($nom != "")
            {
                $employes = array_filter($employes, function ($var, $k) use ($nom){
                    return (strpos(strtoupper($var['nomEmp']), strtoupper($nom)) != false || strpos(strtoupper($var['prenomEmp']), strtoupper($nom))!= false);
                },ARRAY_FILTER_USE_BOTH);
            }
        return $employes;
    }

    #Supprime l'employé dont l'id est passé en parametre
    function supprimerEmploye($id){
        global $base;
        $req = "DELETE FROM employe WHERE idEmploye = $id";

        return $base->exec($req);
    }

    #Ajoute un employe dans la BD

    function ajoutEmploye($numero,$nom,$prenom,$tel,$adresse,$profil,$login,$mdp){
        global $base;

        $req = "INSERT INTO employe (numeroEmp,nomEmp,prenomEmp,adresseEmp,telEmp,login,password,idProfilF) VALUES ('$numero','$nom','$prenom','$adresse','$tel','$login','$mdp',$profil)";

        return $base->exec($req);
    }

    #Modifie un employe dans la BD

    function updateEmploye($numero,$nom,$prenom,$tel,$adresse,$profil,$login,$mdp){
        global $base;

        $req = "UPDATE employe SET nomEmp = '$nom', prenomEmp = '$prenom', adresseEmp = '$adresse', telEmp = '$tel',login = '$login', password = '$mdp', idProfilF = '$profil' WHERE numeroEmp = '$numero'";

        return $base->exec($req);
    }

    #rechercher un employe à travers son id
    function findEmployeById($id){
        global  $base;

        $req ="SELECT * FROM employe, profil WHERE idProfilF = idProfil AND idEmploye = $id";
        return $base->query($req)->fetch();
    }

