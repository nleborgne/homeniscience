<?php 
/* controleur page gestionnaire */

require('gestionnaire_modele.php');

try {
    $domicile = AfficherDomicile();
    $piece = AfficherPiece();
    require('gestionnaire.php');
   
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>