<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

require('../modele/appart_modele.php');

try {
    $user = AfficherUser2();
    $domicile = AfficherDomicile2();
    $donnees_domicile = $domicile->fetch();
    
    
    
    
    
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}

require('../vue/appart_vue.php');

?>