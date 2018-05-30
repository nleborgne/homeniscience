<?php

include("functions_ajout_gestionnaire.php");
include("../modele/ajou_gestionnaire_model.php");



$ID_habitation=get_type_habitation();

if(test_remplissage($_POST)){
    $_POST=htmlspe($_POST);

}
else{
    echo "<p>Veuillez remplir le formulaire correctement</p>";
    require("../vue/formulaire_gestionnaire.php");
}