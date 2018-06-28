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

function conso($id_type) {
    global $bdd;
    $req = $bdd -> prepare("SELECT *, AVG(donnee) from statistiques 
LEFT JOIN equipement on equipement.ID = ID_equipement 
LEFT JOIN piece on piece.ID = ID_piece 
LEFT JOIN domicile ON domicile.ID = piece.ID_domicile 
LEFT JOIN gestionnaire on domicile.ID_gestionnaire = gestionnaire.ID 
LEFT JOIN utilisateur ON domicile.ID = utilisateur.ID_domicile 
WHERE utilisateur.ID = :id_gest AND equipement.ID_type_equipement = :id_type Group by DATE(date)
ORDER BY date ASC LIMIT 7");
    $req -> bindParam('id_type', $id_type, PDO::PARAM_INT);
    $req -> bindParam('id_gest', $_SESSION['ID'],  PDO::PARAM_INT);
    $req -> execute();
    return $req;
}
    

function getnbrcap($id_type) {
    global $bdd;
    $req = $bdd -> prepare("SELECT count(*) from 
(SELECT avg(donnee) from statistiques 
LEFT JOIN equipement on equipement.ID = ID_equipement 
LEFT JOIN piece on piece.ID = ID_piece 
LEFT JOIN domicile ON domicile.ID = piece.ID_domicile 
LEFT JOIN gestionnaire on domicile.ID_gestionnaire = gestionnaire.ID 
LEFT JOIN utilisateur ON domicile.ID = utilisateur.ID_domicile 
WHERE utilisateur.ID = :id_gest AND equipement.ID_type_equipement = :id_type
Group by ID_equipement) as innerquerry");
    $req -> bindParam('id_type', $id_type, PDO::PARAM_INT);
    $req -> bindParam('id_gest', $_SESSION['ID'],  PDO::PARAM_INT);
    $req -> execute();
    return $req;
    
}



    

