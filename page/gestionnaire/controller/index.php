
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
        
        require('../../../trames/trames_traitement.php');
        
        $nbr = getnbrcap(2);
        $nbre = $nbr -> fetch();
        
        
        $capteur = conso(2);
        $array_val = array();
        $array_date = array();
        while ($donnees = $capteur -> fetch()) {
            $data = $donnees['AVG(donnee)']*$nbre['count(*)'];
            array_push($array_val, $data);
            $date = explode(' ', $donnees['date']);
            array_push($array_date, $date[0]);
            
        }
        
        $array_val = json_encode($array_val);
        $array_date = json_encode($array_date);
        
        
        
        
        
        require('../vue/gestionnaire_vue(2).php');
        
        
    }
    else {
        header( "Refresh:0.001; url=../vue/non_gestionnaire.php", true, 303);
    }
    
    
    
   
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>