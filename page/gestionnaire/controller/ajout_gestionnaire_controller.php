<?php

if(!isset($_SESSION)){
  session_start();
}

require('../../../connexion_bdd.php');

include("functions_ajout_gestionnaire.php");
include("../modele/ajout_gestionnaire_model.php");


$ID_habitation=get_type_habitation();


if (!empty(test_remplissage())) {
    htmlspe($_POST);
    Adddomicile($_SESSION['ID'], $_POST['nom_domicile'], $_POST['superficie'], $_POST['numero'], $_POST['rue'], $_POST['nbre_piece'], $_POST['postal'], $_POST['pays']);
    $ID_dom = get_ID_domi($_SESSION['ID']);
    print_r($_SESSION);
    print_r($ID_dom);
    while($id_domicile = $ID_dom->fetch()){
        add_right_gest($_SESSION['ID'], $id_domicile['ID']);
        echo "OK";
    }


    /*get_right_gest();
    $nom_dom = $_POST['nom_domicile'];
    get_right_gest2($nom_dom);*/
    header('location: ../controller/index.php');
}