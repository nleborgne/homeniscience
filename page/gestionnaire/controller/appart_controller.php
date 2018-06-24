<?php 

require('../../../connexion_bdd.php');

require('../modele/appart_modele.php');

try {
    $user = AfficherUser2();
    $user2 = AfficherUser2();
    $domicile = AfficherDomicile2();
    $donnees_domicile = $domicile->fetch();
    
    if (!empty($_POST['email'])) {
        $new_use = getUser($_POST['email']);
        if ($new_use -> rowCount() == 1) {
            $new_user = $new_use -> fetch();
            if ($new_user['ID_domicile'] == 0) {
                AjouterUser($_GET['id'], $_POST['email']);
            
            }
        }
        
    }
    
    
    while ($donnees_user = $user2 -> fetch()) {
        if (!empty($_POST[$donnees_user['ID']])) {
            supprUser($_POST[$donnees_user['ID']]);
        }
    }
    
    
    
    
    
    
    
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}

require('../vue/appart_vue.php');

?>