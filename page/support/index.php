<?php
/* Contrôleur pour la page de support */

/* Appel du modèle */
require('support_modele.php');

try {
  $reponse = afficherPannes();
  $details = afficherDetails();
  require('support_vue.php');
}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}
?>
