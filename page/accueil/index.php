<?php
/* Contrôleur pour la page d'accueil*/
if (!isset($_SESSION)) {
  session_start();
}
/* Appel du modèle */
require('accueil_modele.php');

try {
  $infos = getUserInfos();
  $afficherPieces = getPieces();
  require('accueil_vue.php');
}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}
?>
