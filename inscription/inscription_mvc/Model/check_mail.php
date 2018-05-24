<?php

function check_mail($bdd,$post){
    global $bdd;
    $query = $bdd->prepare( "SELECT email FROM utilisateur WHERE email = :email" );
    $query->bindParam( 'email', $post['email'],PDO::PARAM_STR);
    $query->execute();
    return $query;
}