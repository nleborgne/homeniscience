<?php

require('../connexion_bdd.php');

require('modele_cgu.php');

$cgu = getCGU();

require ('vue_CGU.php');
