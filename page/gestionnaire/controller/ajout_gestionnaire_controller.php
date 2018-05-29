<?php

include("functions_ajout_gestionnaire.php");
include("../modele/ajou_gestionnaire_model.php");

$_POST=htmlspe($_POST);

if(test_remplissage($_POST)){

}
else{
    echo "Veuillez remplir le formulaire correctement";
    require("../vue/formulaire_gestionnaire.php");
}