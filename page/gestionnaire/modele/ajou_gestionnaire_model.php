<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

function ajout_domicile($post, $ID_type_habitation, $ID_gestionnaire){
    global $bdd;
    global $_SESSION;
    $ID_confidentialite=0;
    $consommation = 0;
    $req = $bdd->prepare("INSERT INTO domicile (ID_utilisateur_principal, nom, nombre_pieces, superficie, ID_type_habitation, numero_habitation, rue, code_postal, pays, ID_confidentialite, ID_gestionnaire, consommation)
                                    VALUES (:ID_utilisateur_principal, :nom, :nombre_pieces, :superficie, :ID_type_habitation, :numero_habitation, :rue, :code_postal, :pays, :ID_confidentialite, :ID_gestionnaire, :consommation)");
    $req->bindParam('ID_utilisateur_principal',$_SESSION['ID'],PDO::PARAM_INT);
    $req->bindParam('nom',$_POST['nom'],PDO::PARAM_STR);
    $req->bindParam('nombre_pieces',$post['nbre_piece'],PDO::PARAM_INT);
    $req->bindParam('superficie',$post['superficie'],PDO::PARAM_INT);
    $req->bindParam('ID_type_habitation',$ID_type_habitation,PDO::PARAM_INT);
    $req->bindParam('numero_habitation ',$post['numero'],PDO::PARAM_INT);
    $req->bindParam('rue',$post['rue'],PDO::PARAM_INT);
    $req->bindParam('code_postal',$post['postal'],PDO::PARAM_INT);
    $req->bindParam('pays',$post['pays'],PDO::PARAM_STR);
    $req->bindParam('ID_confidentialite',$ID_confidentialite,PDO::PARAM_INT);
    $req->bindParam('ID_gestionnaire',$ID_gestionnaire,PDO::PARAM_INT);
    $req->bindParam('consommation',$consommation,PDO::PARAM_INT);
    $req->execute();
}

function AfficherDomicile()
{
    global $bdd;
    $reponse = $bdd->prepare('SELECT *,
domicile.ID AS id_domicile 
from gestionnaire INNER JOIN domicile ON gestionnaire.ID = domicile.ID_gestionnaire WHERE gestionnaire.ID_utilisateur = 1');

    $reponse -> execute(array($_SESSION['ID']));
    return $reponse;

}