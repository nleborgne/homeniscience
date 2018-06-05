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

/* fonction pour ajouter un utilisateur de la bdd pour le gestionnaire */
function AjouterUser($id_dom, $email) {
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET ID_domicile = :id_dom WHERE email = :email');
    $req -> bindParam('id_dom', $id_dom, PDO::PARAM_INT);
    $req -> bindParam('email', $email, PDO::PARAM_STR);
    $req->execute();
}




