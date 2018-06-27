<?php
/* Contrôleur pour la page de support */
if(!isset($_SESSION)){
  session_start();
}

require('../../connexion_bdd.php');

/* Appel du modèle */
require('support_modele.php');

try {
  $reponse = afficherPannes();
  $detailsType = afficherTypes();
  if (!empty($_POST['ID_equipement']) && !empty($_POST['descriptif_panne'])) {
    insererPanne();
  }
  require('support_vue.php');
}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}
?>
