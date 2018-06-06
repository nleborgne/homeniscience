<?php
// Connexion à la base de données via PDO
try {
  $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}

function ID_domicile($ID_utilisateur_principal)
{
    global $bdd;

    $ID = $bdd->query("SELECT ID_domicile FROM utilisateur WHERE ID=$ID_utilisateur_principal");
    $ID_domicile=$ID->fetch();
    if ($ID_domicile>0){
        return $ID_domicile['ID_domicile'];
    }
    else{
        $ID_domicile=0;
        return $ID_domicile;
    }
    $ID->closeCursor();

}




function getUserInfos(){
  global $bdd;
  $get = $bdd->prepare('SELECT * FROM utilisateur WHERE ID = ?');
  $get->execute(array($_SESSION['ID']));
  return $get;
}

function getPieces() {
  global $bdd;
  $get = $bdd->prepare('SELECT *,
    piece.ID AS piece_ID,
    piece.nom AS piece_nom,
    utilisateur.nom AS utilisateur_nom
    FROM piece
    INNER JOIN domicile ON piece.ID_domicile = domicile.ID
    INNER JOIN utilisateur ON domicile.ID = utilisateur.ID_domicile
    WHERE utilisateur.ID = ?');
    $get->execute(array($_SESSION['ID']));
    return $get;
  }

  function getEffecteurs($ID) {
    global $bdd;
    $get = $bdd->prepare('SELECT * FROM equipement WHERE ID_piece = ?');
    $get->execute(array($ID));
    return $get;
  }
function Ajouter_message($ID_domicile,$contenu,$ID_user){
  global $bdd;
    echo'model ok';
    $requete = $bdd->prepare('INSERT INTO forum_interne(ID_domicile,ID_utilisateur_envoi,contenu)
                               VALUES (:ID_domicile,:ID_utilisateur_envoi,:contenu)' );

    $requete->bindParam(':ID_domicile',$ID_domicile,PDO::PARAM_INT);
    $requete->bindParam(':ID_utilisateur_envoi',$ID_user,PDO::PARAM_INT);
    $requete->bindParam(':contenu',$contenu,PDO::PARAM_STR);
    $requete->execute();

}

function Ajouter_message2($ID_domicile,$contenu){
    global $bdd;
    $requete = $bdd->prepare('INSERT INTO forum_interne(ID_domicile,ID_utilisateur_envoi,contenu)
                              VALUES (:ID_domicile,:ID_utilisateur_envoi,:contenu )' );
    $requete->execute(array(

        'ID_domicile' => $ID_domicile,
        'ID_utilisateur_envoi' => $_SESSION['id'],
        'contenu' => $contenu,

    ));


}





function Afficher_message($ID_domicile){
    global $bdd;
    $messageforum = $bdd->query("SELECT forum_interne.date as date,forum_interne.contenu as contenu, utilisateur.prenom as prenom FROM forum_interne JOIN utilisateur ON forum_interne.ID_utilisateur_envoi=utilisateur.ID WHERE forum_interne.ID_domicile=$ID_domicile ORDER BY forum_interne.date DESC ");
    return $messageforum ;

    $messageforum->closeCursor();
}