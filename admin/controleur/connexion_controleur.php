<?php
session_start();
require('../connexion_bdd.php');

require('modele/modele.php');

if (isset($_POST['submitLogin'])) {
    $donnees = getInfos($_POST['email']);
    if ($_POST['email'] == $donnees['email'] and password_verify($_POST['mot_de_passe'], $donnees['mot_de_passe'])) {
        if ($donnees['ID_type_utilisateur'] == 3) {
            session_start(); //adaptation de la variable de session de l'utilisateur connecté
            $_SESSION['ID'] = $donnees['ID'];
            header('Location:vue/support_vue.php');
        } else {
            echo "Vous n'êtes pas admin";
        }
    } else {
        echo "votre compte n'existe pas ";
    }

} else if(isset($_SESSION['ID'])) {
    header('Location:controleur/index_controleur.php');
} else {
    require('vue/vue_connexion.php');

}