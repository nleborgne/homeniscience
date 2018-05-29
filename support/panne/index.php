<?php
/* Contrôleur pour la page de support */
/* Appel du modèle */
require('support_modele.php');

try {
  if(isset($_POST['filtre']) && isset($_POST['ordre'])) {
    $reponse = afficherPannes($_POST['filtre'],$_POST['ordre']);
  } else {
    $reponse = afficherPannes("panne_ID","DESC");
  }
  $details = afficherDetails();
  $detailsType = afficherTypes();
  require('support_vue.php');
}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}
?>
