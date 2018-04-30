<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=site_test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) 
                                VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');

$nom = 'Battlefield 1942';
$possesseur = 'Patrick';
$console = 'PC';
$prix = 45;
$nbre_joueurs_max = 50;
$commentaires = '2nde guerre mondiale';

$req->execute(array(

    'nom' => $nom,

    'possesseur' => $possesseur,

    'console' => $console,

    'prix' => $prix,

    'nbre_joueurs_max' => $nbre_joueurs_max,

    'commentaires' => $commentaires

));


echo 'Le jeu a bien été ajouté !';

?>