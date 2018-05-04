<?php 
/* controleur page gestionnaire */

require('gestionnaire_modele.php');

try {
    $reponse = AfficherDomicile();
  
    
    require('gestionnaire.php');
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}
?>