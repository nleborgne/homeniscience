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
    
    
    
    $capteur = getValeurCapteur(1, $_GET['id']);
    $array_date = array();
    $array_date_debut = array();
    $array_date_fin = array();
    
    $i = 0;
   
    while ($donnees = $capteur -> fetch()) {
        
        if ($donnees['donnee'] > 0050) {
            $date = explode(' ', $donnees['date']);
            array_push($array_date, $date[0]);
            echo "bonjour";
            if ($i == 0) {
                echo "coucou";
                array_push($array_date_debut, $date[0]);
                $i = 1;
                print_r($array_date_debut);
            }
        }
        else {
            
            $date = explode(' ', $donnees['date']);
            array_push($array_date, $date[0]);
            if ($i == 1) {
                array_push($array_date_fin, $date[0]);
                $i = 0;
            }
        } 
    }
    
    $heure = array();
    $date = array();
    $j = 0;
    while ($j <= count($array_date_debut) - 1) {
        
        if ($array_date[$j] = $array_date[$j+1]) {
            $heure[$j] +=  $array_date_fin[$j] - $array_date_debut[$j];
        }
        else {
            $heure[$j+1] += $array_date_fin[$j] - $array_date_debut[$j];
        }
        $j += 1;
    }
    
    $array_date = json_encode($array_date);
    $heure = json_encode($heure);
    
    
    
    
    
    
    
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}

require('../vue/appart_vue.php');

?>
