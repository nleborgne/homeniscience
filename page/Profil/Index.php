<?php

if(!isset($_SESSION)){
    session_start();
}

require('profil_modele.php');

$req = getUtilisateur();

require('Profil.php')


?>