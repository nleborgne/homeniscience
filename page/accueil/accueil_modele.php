<?php
// Connexion à la base de données via PDO
try {
  $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
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
    INNER JOIN utilisateur ON domicile.ID_utilisateur_principal = utilisateur.ID
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
  ?>
