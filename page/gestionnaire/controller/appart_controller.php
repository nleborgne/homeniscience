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
    $date_capteur = getDateCapteur(1, $_GET['id']);
    $array_date = array();
    $array_date_debut = array();
    $array_date_fin = array();
    
    
    while ($datum = $date_capteur -> fetch()) {
        $date = explode(' ', $datum['date']);
        array_push($array_date, $date[0]);
    }
    
    
    $i = 0;
    while ($donnees = $capteur -> fetch()) {
        
        if ($donnees['donnee'] > 0100) {
            if ($i == 0) {
                array_push($array_date_debut, $donnees['date']);
                $i = 1;
            }
        }
        else {
            if ($i == 1) {
                array_push($array_date_fin, $donnees['date']);
                $i = 0;
            }
        } 
    }
    
    print_r($array_date);
    print_r($array_date_debut);
    print_r($array_date_fin);
    
    echo $array_date_debut[0];
    
    $heure = array();
    $debut = array();
    $fin = array();
    $j = 0;
    while ($j <= count($array_date_debut) - 1) {
        $date = explode(' ', $array_date_debut[$j]);
        array_push($debut, $date[0]);
        $date = explode(' ', $array_date_fin[$j]);
        array_push($fin, $date[0]);
        
        $date1 = date_create($array_date_debut[$j]);
        $date2 = date_create($array_date_fin[$j]);
        $diff = date_diff($date1, $date2);
        
        if ($debut[$j] = $fin[$j] && $j != 0 && $debut[$j] == $debut[$j-1]) {
            $heure[$j-1] +=  $diff;
        }
        else if ($debut[$j] = $fin[$j]) {
            $heure[$j] += $diff;
        }
        else {
            $heure[$j+1] += $diff;
        }
        $j+=1;
    }
    
    $array_date = json_encode($array_date);
    $heure = json_encode($heure);
    
    
    
    
    
    
    
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}

require('../vue/appart_vue.php');

?>
