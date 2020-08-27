<?php
$serveur = 'localhost';
$nombd = 'bank_giage';
$user = 'root';
$mdp = '';

try {
    $base = new PDO('mysql:host='.$serveur.';dbname='.$nombd,$user,$mdp,
        [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la BD ".$e->getMessage();
}
function lastInsertIdForTable($nom)
{
    $sql = "SELECT max(id) FROM $nom";
    global $base;
    $array =  $base -> query($sql) -> fetch();
    if($array == NULL){
        $id = 1;
    }else{
        $array[0]++;
        $id = $array[0];
    }
    return $id;
}
?>