<?php
// Connexion à la BDD
require('../../connexion_bdd.php');

// Modèle
require('../modele/modele_settings.php');

$cgu = getCGU();

if(isset($_POST['submitCGU'])) {
    postCGU($_POST['contenu']);
    $cgu = getCGU();
}

if(isset($_POST['delete'])) {
    delete($_POST['emailDelete']);
}

// Vue
require('../vue/vue_settings.php');

