<?php
require ('modele_connexion.php');
/*
if ($compteur == 1) {
    require('../page/accueil/accueil_vue.php');
}
*/
$connexion = connexion();
while($donnees = $connexion->fetch()) //vérification des données saisies avec celles de la BDD
{
    if($_POST['email'] == $donnees['email'] and password_verify ( $_POST['mot_de_passe'] , $donnees['mot_de_passe'] ) )
    {
        //echo 'cezcz';
        //$compteur = 1;
        session_start(); //adaptation de la variable de session de l'utilisateur connecté
        $_SESSION['ID']=$donnees['ID'];
        $_SESSION['prenom']=$donnees['prenom'];
        $_SESSION['nom']=$donnees['nom'];
        //print_r($_SESSION);
        header('location: ../page/accueil/index.php'); //connexion à la page d'accueil du site Internet
    }
}
echo "<p>Echec de la connexion. Veuillez réessayer.</p>";
echo "<p><a href='vue_connexion.php'>Connexion</a></p>";
//termine le traitement de la requête
