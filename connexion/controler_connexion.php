<?php
require ('modele_connexion.php');
if ($compteur == 1) {
    require('../page/accueil/accueil_vue.php');
}
else
{
    echo "<p>Echec de la connexion. Veuillez réessayer.</p>";
    echo "<p><a href='vue_connexion.php'>Connexion</a></p>";
    $reponse->closeCursor(); //termine le traitement de la requête
}