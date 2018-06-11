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

/* fonction pour ajouter un utilisateur de la bdd pour le gestionnaire (modif utilisateur ID_domicile)
 * et modif type_user en principal */
function AjouterUser($id_dom, $email) {
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET ID_domicile = :id_dom, ID_type_utilisateur = 2 WHERE email = :email');
    $req -> bindParam('id_dom', $id_dom, PDO::PARAM_INT);
    $req -> bindParam('email', $email, PDO::PARAM_STR);
    $req->execute();
    header('Refresh:0');
}


/* fonction pour recuperer l'ID et l'ID_domicile d'un utilisateur d'un utilisateur suivant son email */
function getUser($email) {
    global $bdd;
    $req = $bdd -> prepare('SELECT ID, ID_domicile FROM utilisateur WHERE email = :email');
    $req -> bindParam('email', $email, PDO::PARAM_STR);
    $req -> execute(); 
    return $req;
}

/* fonction pour supprimer un utilisateur en tant que gestionnaire */
function supprUser($id_user) {
    global $bdd;
    $req = $bdd -> prepare('UPDATE utilisateur SET ID_domicile = 0 WHERE ID = :id_user');
    $req -> bindParam('id_user', $id_user, PDO::PARAM_INT);
    $req -> execute();   
    header('Refresh:0');
}







