<?php
if(!isset($_SESSION)){
  session_start();
  $ID_utilisateur_principal=$_SESSION['ID'];
}



try {
    if(isset($_POST['acceptez_lechec'])) {
        header('Location:../../accueil/index.php');

    }



  require('domicile.php');

}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}


