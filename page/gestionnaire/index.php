
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
        echo "<script>alert('Vous n\'etes pas gestionnaire')</script>";
        header( "Refresh:0.001; url=../domicile", true, 303);
    }
    
    
    
   
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>