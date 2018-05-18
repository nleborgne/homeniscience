
<?php 
/* controleur page gestionnaire */

    if(!isset($_SESSION)){
        session_start();
    }


require('gestionnaire_modele.php');

try {
    $gestionnaire = IS_gestionnaire();
    $piece = AfficherPiece();
    
    
    $gest = $gestionnaire -> fetch();
    if ($gest['gestionnaire'] == 1) {
        $domicile = AfficherDomicile();
        
        
        require('gestionnaire.php');
        
        
    }
    else {
        header( "Refresh:0.001; url=non_gestionnaire.php", true, 303);
    }
    
    
    
   
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>