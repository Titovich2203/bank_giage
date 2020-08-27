<?php 
	require_once 'bdd.php';
	function getClientByIdCompte($idCompte)
	{
		$sql = "SELECT Cl.* FROM client Cl, Compte Cp WHERE Cp.idCLIENT = Cl.id AND Cp.id = '$idCompte' ";
		global $base;
		return $base -> query($sql) -> fetch();
	}
	function getAllClients()
	{
		$sql = "SELECT * FROM client";
		global $base;
		return $base -> query($sql) -> fetchall();
	}
	function getAllClientsWithNbCp()
	{
		$sql = "SELECT c.*, count(cp.id) as nbCp FROM client c, compte cp WHERE cp.idClient = c.id HAVING count(cp.id) > 0";
		global $base;
		return $base -> query($sql) -> fetchall();
	}
	function getClientByCni($cni)
	{
		$sql = "SELECT * FROM client WHERE cni='$cni' ";
		global $base;
		return $base -> query($sql) -> fetch();
	}
	function getClientById($id)
	{
		$sql = "SELECT * FROM client WHERE id='$id' ";
		global $base;
		return $base -> query($sql) -> fetch();
	}

    function deleteClientAndComptes($id)
    {
        global $base;
        $sql = "DELETE FROM compte WHERE idClient = $id";
        $base -> exec($sql);
        $sql = "DELETE FROM client WHERE id = $id";
        return $base -> exec($sql);
    }

 ?>