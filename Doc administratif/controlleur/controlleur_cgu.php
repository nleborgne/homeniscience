<?php

if(!isset($_SESSION)){
    session_start();
}

require('../../connexion_bdd.php');

require('../modele/modele_cgu.php');

$cgu = getCGU();

require ('../vue/vue_CGU.php');
