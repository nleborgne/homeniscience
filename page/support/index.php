<?php
/* Contrôleur pour la page de support */
if(!isset($_SESSION)){
  session_start();
}
/* Appel du modèle */
require('support_modele.php');

try {
  $reponse = afficherPannes();
  $detailsType = afficherTypes();
  require('support_vue.php');
}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}
?>
