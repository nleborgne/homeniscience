<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

function ajout_domicile($ID_type_habitation, $ID_gestionnaire){
    global $bdd;
    $ID_confidentialite=0;
    $consommation = 0;
    $req = $bdd->prepare("INSERT INTO domicile (ID_utilisateur_principal, nom, nombre_pieces, superficie, ID_type_habitation, numero_habitation, rue, code_postal, pays, ID_confidentialite, ID_gestionnaire, consommation)
                                    VALUES (:ID_utilisateur_principal, :nom, :nombre_pieces, :superficie, :ID_type_habitation, :numero_habitation, :rue, :code_postal, :pays, :ID_confidentialite, :ID_gestionnaire, :consommation)");
    $req->bindParam('ID_utilisateur_principal',$_SESSION['ID'],PDO::PARAM_INT);
    $req->bindParam('nom',$_POST['nom_domicile'],PDO::PARAM_STR);
    $req->bindParam('nombre_pieces',$_POST['nbre_piece'],PDO::PARAM_INT);
    $req->bindParam('superficie',$_POST['superficie'],PDO::PARAM_INT);
    $req->bindParam('ID_type_habitation',$ID_type_habitation,PDO::PARAM_INT);
    $req->bindParam('numero_habitation ',$_POST['numero'],PDO::PARAM_INT);
    $req->bindParam('rue',$_POST['rue'],PDO::PARAM_STR);
    $req->bindParam('code_postal',$_POST['postal'],PDO::PARAM_INT);
    $req->bindParam('pays',$_POST['pays'],PDO::PARAM_STR);
    $req->bindParam('ID_confidentialite',$ID_confidentialite,PDO::PARAM_INT);
    $req->bindParam('ID_gestionnaire',$ID_gestionnaire,PDO::PARAM_INT);
    $req->bindParam('consommation',$consommation,PDO::PARAM_INT);
    $req->execute();
}

function Adddomicile($ID_utilisateur_principal,$nom,$size,$num,$rue,$cp,$pays)
{
    global $bdd;
    $requete = $bdd ->prepare('INSERT INTO domicile(ID,ID_utilisateur_principal,nom,nombre_pieces,superficie,ID_type_habitation,numero_habitation,rue,code_postal,pays,ID_confidentialite,ID_gestionnaire, consommation)
                                VALUES (:ID,:ID_utilisateur_principal,:nom,:nombre_pieces,:superficie,:ID_type_habitation,:numero_habitation,:rue,:code_postal,:pays,:ID_confidentialite,:ID_gestionnaire, :conso)');
    $requete ->execute(array(
        'ID' =>NULL,
        'ID_utilisateur_principal' => $ID_utilisateur_principal,
        'nom' => $nom,
        'nombre_pieces' => 0,
        'superficie' =>$size,
        'ID_type_habitation' =>1,
        'numero_habitation' =>$num,
        'rue' =>$rue,
        'code_postal' =>$cp,
        'pays' =>$pays,
        'ID_confidentialite' =>1,
        'ID_gestionnaire'=>0,
        'conso'=>0,
    ));

}

function AfficherDomicile()
{
    global $bdd;
    $reponse = $bdd->prepare('SELECT *,
domicile.ID AS id_domicile 
FROM gestionnaire INNER JOIN domicile ON gestionnaire.ID = domicile.ID_gestionnaire WHERE gestionnaire.ID_utilisateur = ?');

    $reponse->execute(array($_SESSION['ID']));
    return $reponse;
}

function get_right_gest(){
    global $bdd;
    $gest=1;
    $req = $bdd->prepare('UPDATE gestionnaire SET gestionnaire = :gestionnaire WHERE ID_utilisateur = :ID_utilisateur');
    $req->bindParam('gestionnaire',$gest);
    $req->bindParam('ID_utilisateur',$_SESSION['ID']);
    $req->execute();
}

function get_type_habitation(){
    global $bdd;
    $req= $bdd->query("SELECT * FROM type_habitation");
    return $req;
}