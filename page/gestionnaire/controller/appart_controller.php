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
    
    require('../../../trames/trames_traitement.php');
    
    
    while ($donnees_user = $user2 -> fetch()) {
        if (!empty($_POST[$donnees_user['ID']])) {
            supprUser($_POST[$donnees_user['ID']]);
        }
    }
    
    
    
    $capteur = getValeurCapteur(1, $_GET['id']);
  /*  $date_capteur = getDateCapteur(1, $_GET['id']); */
    $array_valeur = array();
    $array_date = array();
    
    /*
    $array_date_debut = array();
    $array_date_fin = array();
    
    
    while ($datum = $date_capteur -> fetch()) {
        $date = explode(' ', $datum['date']);
        array_push($array_date, $date[0]);
    }
    */
    
    /* $i = 0; */
    while ($donnees = $capteur -> fetch()) {
        $date = explode(' ', $donnees['date']);
        array_push($array_date, $date[0]);
        
        array_push($array_valeur, $donnees['moyenne']);
        /*
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
    
    $heure = array();
    for ($k = 0; $k < count($array_date); $k++) {
        array_push($heure, "0");
    }
    
    $debut = array();
    $fin = array();
    $j = 0;
    while ($j <= count($array_date_debut) - 1) {
        $date = explode(' ', $array_date_debut[$j]);
        array_push($debut, $date[0]);
        $date = explode(' ', $array_date_fin[$j]);
        array_push($fin, $date[0]);
        
        $date1 = $array_date_debut[$j];
        $date2 = $array_date_debut[$j];
        
        $diff = abs(strtotime($date2) - strtotime($date1));
        
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        
        $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60)/ (60*60));
        $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60 - $hours*60*60)/ (60));
        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60 - $hours*60*60 - $minutes*60));
        
        $fetcha = $years."-".$months."-".$days." ".$hours.":".$minutes.":".$seconds;
        echo $fetcha;
        if ($debut[$j] = $fin[$j] && $j != 0 && $debut[$j] == $debut[$j-1]) {
            $tamp = $heure[$j-1];
            $heure[$j-1] = "";
            
            $sum = abs(strtotime($tamp) + strtotime($fetcha));
            
            $years = floor($sum / (365*60*60*24));
            $months = floor(($sum - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($sum - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            
            $hours = floor(($sum - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60)/ (60*60));
            $minutes = floor(($sum - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60 - $hours*60*60)/ (60));
            $seconds = floor(($sum - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60 - $hours*60*60 - $minutes*60));
            
            $heure[$j-1] = $years."-".$months."-".$days." ".$hours.":".$minutes.":".$seconds;
        }
        else if ($debut[$j] = $fin[$j]) {
            $tamp = $heure[$j];
            $heure[$j] = "";
            
            $sum = abs(strtotime($tamp) + strtotime($fetcha));
            
            $years = floor($sum / (365*60*60*24));
            $months = floor(($sum - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($sum - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            
            $hours = floor(($sum - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60)/ (60*60));
            $minutes = floor(($sum - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60 - $hours*60*60)/ (60));
            $seconds = floor(($sum - $years * 365*60*60*24 - $months*30*60*60*24 - $days*24*60*60 - $hours*60*60 - $minutes*60));
            
            $heure[$j] = $years."-".$months."-".$days." ".$hours.":".$minutes.":".$seconds;
        }
        $j+=1;
        */
    }
    
    
    $array_date = json_encode($array_date);
    $array_valeur = json_encode($array_valeur);
    
    
    
    
    
    
    
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}

require('../vue/appart_vue.php');

?>
