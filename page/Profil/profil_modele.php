<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

function getUtilisateur($idUser) {
    global $bdd;
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE ID = :id');
    $req->bindParam('id', $idUser, PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function modifNomUtilisateur($nom,$prenom,$idUser) {
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET nom = :nvnom, prenom = :nvprenom WHERE ID = :id');
    $req->bindParam('nvnom',$nom,PDO::PARAM_STR);
    $req->bindParam('nvprenom',$prenom,PDO::PARAM_STR);
    $req->bindParam('id',$idUser,PDO::PARAM_INT);
    $req->execute();
}

function modifEmailUtilisateur($email, $idUser){
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET email = :nvemail WHERE ID = :id');
    $req->bindParam('nvemail',$email,PDO::PARAM_STR);
    $req->bindParam('id',$idUser,PDO::PARAM_INT);
    $req->execute();
}

function getMdpUtilisateur($idUser){
    global $bdd;
    $req = $bdd->prepare('SELECT mot_de_passe FROM utilisateur WHERE ID = :id');
    $req->bindParam('id', $idUser, PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function modifMdpUtilisateur($mdp, $idUser){
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = :mdp WHERE ID = :id');
    $req->bindParam('mdp', $mdp, PDO::PARAM_STR);
    $req->bindParam('id', $idUser, PDO::PARAM_INT);
    $req->execute();
}


