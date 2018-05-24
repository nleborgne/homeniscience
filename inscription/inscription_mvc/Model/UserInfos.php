<?php

function getUserInfos($session){
    global $bdd;
    $get = $bdd->prepare('SELECT * FROM utilisateur WHERE ID = :ID');
    $get->bindParam('ID',$session['ID'],PDO::PARAM_INT);
    $get->execute();
    return $get;
}