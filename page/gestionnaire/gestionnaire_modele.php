<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

function AfficherDomicile()
{
    global $bdd;
    $reponse = $bdd->query('SELECT * from domicile WHERE ID_gestionnaire = 1');
    return $reponse;
    $reponse->closeCursor();
}

function AfficherPiece()
{
    global $bdd;
    $reponse = $bdd->query('SELECT * from piece WHERE ID_domicile = 0');
    return $reponse;
    $reponse->closeCursor();
}

function AfficherUser()
{
    global $bdd;
    $reponse = $bdd->query('SELECT * from utilisateur WHERE ID_domicile = 0');
    return $reponse;
    $reponse->closeCursor();
}
    
?>







