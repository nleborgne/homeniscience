<?php



try
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

function getUtilisateur($id_user) {
    global $bdd;
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE ID = :id');
    $req->bindParam('id', $id_user, PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function modifNomUtilisateur($nom,$prenom,$id_user) {
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET nom = :nvnom, prenom = :nvprenom WHERE ID = :id');
    $req->execute( array(
        'nvnom' => $nom,
        'nvprenom' => $prenom,
        'id' => $id_user
    ));
}

function modifEmailUtilisateur($email, $id_user){
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET email = :nvemail WHERE ID = :id');
    $req->execute( array(
        'nvemail' => $email,
        'id' => $id_user
    ));
}

function getMdpUtilisateur($id_user){
    global $bdd;
    $req = $bdd->prepare('SELECT mot_de_passe FROM utilisateur WHERE ID = :id');
    $req->bindParam('id', $id_user, PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function modifMdpUtilisateur($mdp, $id_user){
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = :mdp WHERE ID = :id');
    $req->execute( array(
        'mdp' => $mdp,
        'id' => $id_user
    ));
}


