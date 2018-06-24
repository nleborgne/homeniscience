<?php
require('../../../connexion_bdd.php');
require('support_modele.php');
try {
  miseAJour();}
  catch (Exception $e){
    echo 'Erreur : '.$e->getMessage();
  }
header("Location:index/".$_POST['ID']);
?>
