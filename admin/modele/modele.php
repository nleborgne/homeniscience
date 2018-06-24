<?php

function getInfos($email)
{
    global $bdd;
    $get = $bdd->prepare('SELECT ID, email, mot_de_passe, ID_type_utilisateur FROM utilisateur WHERE email=:email');
    $get->bindParam('email', $email);
    $get->execute();
    return $get->fetch();
}