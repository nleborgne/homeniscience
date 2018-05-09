
<?php 
    session_start();
?>



<?php 
/* controleur page gestionnaire */

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
        header( "Refresh:0.001; url=../domicile/domicile.php", true, 303);
    }
    
    
    
   
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>