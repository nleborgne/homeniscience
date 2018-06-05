<?php
//préparation de la requête
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', 'tristank');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
//définition de la session de l'utilisateur
$reponse = $bdd->query('SELECT ID, email, mot_de_passe,prenom,nom FROM utilisateur');
while ($donnees = $reponse->fetch()) {
    $_SESSION['ID']=$donnees['ID'];
    $_SESSION['adresse']=$donnees['email'];
    $_SESSION['prenom']=$donnees['prenom'];
    $_SESSION['nom']=$donnees['nom'];
}
?>


