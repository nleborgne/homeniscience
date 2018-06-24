<?php


function IS_gestionnaire()
{
    global $bdd;

    $ses = $bdd->prepare('SELECT * from gestionnaire WHERE ID_utilisateur = ?');
    $ses->execute(array($_SESSION['ID']));
    return $ses;
    
}

function AfficherDomicile()
{
        global $bdd;
        $reponse = $bdd->prepare('SELECT *,
domicile.ID AS id_domicile 
from gestionnaire INNER JOIN domicile ON gestionnaire.ID_utilisateur = domicile.ID_gestionnaire WHERE gestionnaire.ID_utilisateur = ? GROUP BY domicile.ID');

        $reponse -> execute(array($_SESSION['ID']));
        return $reponse;
        
}
    
    
function AfficherPiece()
{
    global $bdd;
    $reponse = $bdd->query('SELECT * from piece WHERE ID_domicile = 0');
    return $reponse;
   
}

function AfficherUser()
{
    global $bdd;
    $reponse = $bdd->prepare('SELECT * from utilisateur WHERE ID_domicile = ?');
    $reponse -> execute(array($_GET['id']));
    return $reponse;
}



function User($domicil)
{
    global $bdd;
    $reponse = $bdd->prepare("SELECT nom, prenom FROM utilisateur WHERE ID_domicile= :dom ");
    $reponse -> bindParam('dom', $domicil, PDO::PARAM_INT);
    $reponse -> execute();
    return $reponse;
    
}

function conso($id_gest) {
    global $bdd;
    $req = $bdd -> prepare("SELECT SUM(consommation) AS conso_totale 
FROM domicile 
INNER JOIN gestionnaire 
ON ID_gestionnaire = gestionnaire.ID
WHERE ID_utilisateur = ?");
    $req -> bindParam(1, $id_gest,  PDO::PARAM_INT);
    $req -> execute();
    return $req;
}
    

    

