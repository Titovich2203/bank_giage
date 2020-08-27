<?php  
	require_once 'bdd.php';
	function getTypeOpByNom($nom){
		$sql = "SELECT * FROM typeoperation WHERE nom='$nom'";
		global $base;
		return $base -> query($sql) -> fetch(); 
	}
	function depot($numero, $dateOperation, $montant, $idCompte, $idTypeOp, $idGestCompte){
		global $base;
		$lastId = lastInsertIdForTable("operation") ;
		$sql = "INSERT INTO operation VALUES ('$lastId', '$numero','$dateOperation', $montant, $idCompte, $idTypeOp, $idGestCompte, 1)";
		
		if($base -> exec($sql) > 0){
			$sql1 = "UPDATE compte SET solde=solde+$montant WHERE id=$idCompte";
			return $base -> exec($sql1);
		}

	}
	function emprunt($numero, $dateOperation, $montant, $idCompte, $idTypeOp, $idGestCompte){
		$sql = "SELECT sousPret, solde FROM COMPTE WHERE id = '$idCompte' ";
		global $base;
		$ssp = $base -> query($sql) -> fetch();
		if($ssp['sousPret'] == '0' && $montant <= ($ssp['solde']*2) && $ssp['solde']>= 10000)
		{
			$lastId = lastInsertIdForTable("operation") ;
			$sql = "INSERT INTO operation VALUES ('$lastId', '$numero','$dateOperation', $montant, $idCompte, $idTypeOp, $idGestCompte, 1)";
			
			if($base -> exec($sql) > 0){
				$sql = "UPDATE compte SET soldePret=soldePret+($montant*1.1), sousPret = 1 WHERE id=$idCompte";
				return $base -> exec($sql);
			}
		}
	}
	function genererNumeroOperation(){
        $sql = "SELECT max(id) FROM operation";
        global $base;
        $array =  $base -> query($sql) -> fetch();
        if($array == NULL){
            $id = 1;
        }else{
            $array[0]++;
            $id = $array[0];
        }
        $numero = 'BG_OP_'.date('dmY').'_'.$id;
        return $numero;
    }
    // creer la fonction de retrait 
	function retrait($numero, $dateOperation, $montant, $idCompte, $idTypeOp, $idGestCompte)
	{
		global $base;
		$rep = $base -> query('SELECT solde FROM compte WHERE id='.$idCompte.'');
		$solde = $rep -> fetch();
		if (($solde['solde'] - $montant) >= 500) {
			$lastId = lastInsertIdForTable("operation");
			$sql = "INSERT INTO operation VALUES ('$lastId', '$numero','$dateOperation', $montant, $idCompte, $idTypeOp, $idGestCompte, 1)";
			if($base -> exec($sql) > 0){
				$sql1 = "UPDATE compte SET solde=solde-$montant WHERE id=$idCompte";
				return $base -> exec($sql1);
			}
		}
		else
		{
			return 0;
		}
	}
	function remboursement($numero, $dateOperation, $montant, $idCompte, $idTypeOp, $idGestCompte){
		$sql = "SELECT sousPret, soldePret FROM COMPTE WHERE id = '$idCompte' ";
		global $base;
		$ssp = $base -> query($sql) -> fetch();
		if ($ssp['sousPret'] == 1 && $ssp['soldePret'] > 0) {
			if (($montant != $ssp['soldePret'] && $montant < ($ssp['soldePret']/2)) || $montant > $ssp['soldePret'] || ($montant != $ssp['soldePret'] && $ssp['soldePret']-$montant < 500)) {
				return 0;
			}
			else
			{
				$lastId = lastInsertIdForTable("operation") ;
				$sql = "INSERT INTO operation VALUES ('$lastId', '$numero','$dateOperation', $montant, $idCompte, $idTypeOp, $idGestCompte, 1)";
				
				if($base -> exec($sql) > 0){
					if ($montant == $ssp['soldePret']) {
						$sql1 = "UPDATE compte SET soldePret=0, sousPret = 0 WHERE id=$idCompte";
						$base -> exec($sql1);
						$sql1 = "UPDATE operation, typeoperation T SET etatOp = 0 WHERE idCompte = $idCompte AND idTypeOpe = T.id AND( T.nom = 'emprunt' OR T.nom = 'remboursement')";
						return $base -> exec($sql1);
					}
					else
					{
						$sql1 = "UPDATE compte SET soldePret=soldePret-$montant WHERE id=$idCompte";
						return $base -> exec($sql1);
					}
				}
			}
		}
		else
		{
			return 0;
		}

	}
	function listOpByIdCompte($id){
		$sql= "SELECT O.id as idO,O.numero,O.dateOperation,O.montant, O.etatOp, U.*, T.nom as type FROM operation O,employe U,typeoperation T WHERE O.idGestCompte=U.idEmploye AND O.idTypeOpe = T.id AND O.idCompte = $id";
		global $base;
		return $base -> query($sql) -> fetchall();
		/*
		$reponse = $base -> query($sql);
		while($donnees = $reponse -> fetch())
		{
			$operation[] = $donnees;
		}
		*/
	}
	function listOp()
	{
		$sql= "SELECT O.id as idO,O.numero,O.dateOperation,O.montant, O.etatOp, O.idCompte, U.*, T.nom as type FROM operation O,employe U,typeoperation T WHERE O.idGestCompte=U.idEmploye AND O.idTypeOpe = T.id ";
		global $base;
		return $base -> query($sql) -> fetchall();
	}
	function delete($idOp, $type, $mnt)
	{
		global $base;
		if($type == "depot"){
				$sql = "UPDATE operation set etatOp = 0 WHERE id='$idOp'";
				$sql2 = "UPDATE compte set solde =(solde - $mnt) WHERE id = (SELECT idCompte FROM operation WHERE id='$idOp')";
		}
        if($type == "retrait")
		{
			$sql = "UPDATE operation set etatOp = 0 WHERE id='$idOp'";
			$sql2 = "UPDATE compte set solde =(solde + $mnt) WHERE id = (SELECT idCompte FROM operation WHERE id='$idOp')";
		}
		$base -> exec($sql);
		$base -> exec($sql2);
		return 1;
	}
	function getAllTypeOp()
	{
		$sql = "SELECT * FROM typeoperation";
		global $base;
		return $base -> query($sql) -> fetchall();
	}

	function deleteOpByIdCompte($id)
    {
        global $base;
        $sql = "UPDATE operation set etatOp = 0 WHERE idCompte='$id'";
        return $base -> exec($sql);
    }
	function reallyDeleteOpByIdCompte($id)
    {
        global $base;
        $sql = "DELETE FROM operation WHERE idCompte='$id'";
        return $base -> exec($sql);
    }
?>