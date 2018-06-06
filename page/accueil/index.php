<?php
/* Contrôleur pour la page d'accueil*/
if (!isset($_SESSION)) {
  session_start();
}
/* Appel du modèle */
require('accueil_modele.php');
$ID_user=$_SESSION['ID'];

$ID_domicile=ID_domicile($_SESSION['ID']);
//echo $ID_domicile;
$messageforum=Afficher_message($ID_domicile);

try {
  $infos = getUserInfos();
  $afficherPieces = getPieces();
    require('accueil_vue.php');
    if(isset($_POST['ajouter']) && !empty($_POST['msg_forum']) ){
      echo'index ok';

         Ajouter_message($ID_domicile,$_POST['msg_forum'],$ID_user);
    }
}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}
?>
