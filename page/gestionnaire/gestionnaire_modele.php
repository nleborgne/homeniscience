<?php

if(!isset($_SESSION)){
    session_start();
}

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

function IS_gestionnaire()
{
    global $bdd;

    $ses = $bdd->prepare('SELECT * from gestionnaire WHERE ID_utilisateur = ?');
    $ses->execute(array($_SESSION['ID']));
    return $ses;
    $ses -> closeCursor();
}

function AfficherDomicile()
{
        global $bdd;
        $reponse = $bdd->prepare('SELECT *
from gestionnaire
INNER JOIN domicile ON gestionnaire.ID = domicile.ID_gestionnaire
WHERE gestionnaire.ID_utilisateur = ?');

        $reponse -> execute(array($_SESSION['ID']));
        return $reponse;
        $reponse -> closeCursor();
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
    $reponse = $bdd->prepare('SELECT * from utilisateur WHERE ID_domicile = ?');
    $reponse -> execute(array($_GET['id']));
    return $reponse;
    $reponse->closeCursor();
}
    
?>
