
<?php 
/* controleur page gestionnaire */

    if(!isset($_SESSION)){
        session_start();
    }
    
    require('../../../connexion_bdd.php');


require('../modele/gestionnaire_modele.php');

try {
    $gestionnaire = IS_gestionnaire();
    $piece = AfficherPiece();
    
    
    $gest = $gestionnaire -> fetch();
    if ($gest['gestionnaire'] == 1) {
        
        $domicile = AfficherDomicile();
        $domicile1 = AfficherDomicile();
        
        $conso = conso($gest['ID_utilisateur']);
        $consosum = $conso -> fetch();
        
        require('../vue/gestionnaire_vue(2).php');
        
        
    }
    else {
        header( "Refresh:0.001; url=../vue/non_gestionnaire.php", true, 303);
    }
    
    
    
   
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>