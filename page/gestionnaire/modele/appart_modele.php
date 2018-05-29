<?php 


function AfficherUser2()
{
    global $bdd;
    $reponse = $bdd->prepare('SELECT * from utilisateur WHERE ID_domicile = ?');
    $reponse -> execute(array($_GET['id']));
    return $reponse;
}

function AfficherDomicile2() {
    global $bdd;
    $req = $bdd->prepare('SELECT * FROM domicile WHERE ID = ?');
    $req->execute(array($_GET['id']));
    return $req;
}