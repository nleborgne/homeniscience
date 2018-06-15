<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

function getInfos($email)
{
    global $bdd;
    $get = $bdd->prepare('SELECT ID, email, mot_de_passe, ID_type_utilisateur FROM utilisateur WHERE email=:email');
    $get->bindParam('email', $email);
    $get->execute();
    return $get->fetch();
}