
<?php 
/* controleur page gestionnaire */

    if(!isset($_SESSION)){
        session_start();
    }

try {
        $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

require('../modele/gestionnaire_modele.php');

try {
    $gestionnaire = IS_gestionnaire();
    $piece = AfficherPiece();
    
    
    $gest = $gestionnaire -> fetch();
    if ($gest['gestionnaire'] == 1) {
        
        $domicile = AfficherDomicile();
        
        require('../vue/gestionnaire_vue.php');
        
        
    }
    else {
        header( "Refresh:0.001; url=../vue/non_gestionnaire.php", true, 303);
    }
    
    
    
   
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>