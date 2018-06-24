<?php
/* Contrôleur pour la page de support */

require('../../../connexion_bdd.php');

/* Appel du modèle */
require('support_modele.php');

try {
  $reponse = afficherPannes();
  $details = afficherDetails();
  $detailsType = afficherTypes();
  require('support_vue.php');
}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}
?>
