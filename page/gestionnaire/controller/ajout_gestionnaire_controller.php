<?php

if(!isset($_SESSION)){
  session_start();
}


include("functions_ajout_gestionnaire.php");
include("../modele/ajou_gestionnaire_model.php");


$ID_habitation=get_type_habitation();


if (!empty($_POST{'nom_domicile'})) {
    Adddomicile($_SESSION['ID'], $_POST['nom_domicile'], $_POST['superficie'], $_POST['numero'], $_POST['rue'], $_POST['postal'], $_POST['pays']);
    get_right_gest();
    $nom_dom = $_POST['nom_domicile'];
    get_right_gest2($nom_dom);
    header('location: ../controller/index.php');
}