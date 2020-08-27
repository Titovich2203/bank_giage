<?php
    require_once 'bdd.php';
    function insererClient($cni, $nom, $prenom, $adresse,  $tel)
    {
        $lastId = lastInsertIdForTable("client");

        $insert = "INSERT INTO client (id,cni,nom,prenom,adresse,tel) VALUES ('$lastId','$cni','$nom','$prenom','$adresse','$tel')";
        global $base;
        if($base -> exec($insert) > 0)
        return $base -> lastInsertId();
        else
            return 0;
    }
    function ajoutCompte($numero, $dateCreation, $solde, $idClient, $idGestCompte)
    {
        //$idClient = insererClient();
        $lastId = lastInsertIdForTable("compte");
       $insert = "INSERT INTO compte VALUES ('$lastId','$numero','$dateCreation',0,$idClient,$idGestCompte, 1, 0, 0)";
        global $base;
        $base -> exec($insert);
        return $base -> lastInsertId();
    }

    function genererNumeroCompte(){
        $sql = "SELECT max(id) FROM compte";
        global $base;
        $array =  $base -> query($sql) -> fetch();
        if($array == NULL){
            $id = 1;
        }else{
            $array[0]++;
            $id = $array[0];
        }
        $numero = 'BG_CPT_'.date('dmY').'_'.$id;
        return $numero;
    }
    // Creer une methode findCompteByNumero($numero).
    function findCompteByNumero($numero){
        $sql = "SELECT * FROM compte WHERE numero='$numero' AND etat = 1";
        global $base;
        return $base -> query($sql) -> fetch();
    }
    // Creer une methode qui retourne la liste des comptes (getAllCompte).
    function getAllCompte(){
        $sql = "SELECT * FROM compte";
        global $base;
        return $base -> query($sql) -> fetchall();
    }
    function getAllCompteAvecClients(){
        $sql = "SELECT Co.*,Cl.cni,Cl.nom,Cl.prenom,Cl.adresse,Cl.tel, Cl.id as idCl FROM compte Co,client Cl WHERE Co.idClient = Cl.id";
        global $base;
        return $base -> query($sql) -> fetchall();
    }
    function changeEtat($idCompte){
        $sql = "SELECT etat FROM compte WHERE id='$idCompte'";
        global $base;
        $etat = $base -> query($sql) -> fetch();
        if ($etat[0] == '1') 
        {
            $sql = "UPDATE compte set etat = 0 WHERE id = '$idCompte'";
            return $base -> exec($sql);
        }
        else
        {
            $sql = "UPDATE compte set etat = 1 WHERE id = '$idCompte'";
            return $base -> exec($sql);
        }
    }
    function getNumCompteByIdOp($idOp)
    {
        $sql = "SELECT numero FROM compte WHERE id = (SELECT idCompte FROM operation WHERE id='$idOp')";
        global $base;
        return $base -> query($sql) -> fetch();
    }

    function getCompteById($id)
    {
        $sql = "SELECT * FROM compte WHERE id = '$id'";
        global $base;
        return $base -> query($sql) -> fetch();
    }
    function getComptesByIdClient($idCli)
    {
        $sql = "SELECT CP.*, U.nomEmp, U.prenomEmp FROM compte CP, client CL, employe U WHERE CP.idClient = CL.id AND CP.idGestCompte = U.idEmploye AND CL.id = '$idCli' ";
        global $base;
        return $base -> query($sql) -> fetchall();
    }
?>