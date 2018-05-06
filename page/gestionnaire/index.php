<?php 
/* controleur page gestionnaire */

require('gestionnaire_modele.php');

try {
    $domicile = AfficherDomicile();
    $piece = AfficherPiece();
  
    
    require('gestionnaire.php');
    require('appart_description.php');
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>