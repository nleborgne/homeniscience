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

function modifInfoUtilisateur($email,$nom,$prenom,$id_user) {
    global $bdd;
    $req = $bdd->prepare('UPDATE utilisateur SET email = :nvemail, nom = :nvnom, prenom = :nvprenom WHERE ID = :id');
    $req->execute( array(
        'nvemail' => $email,
        'nvnom' => $nom,
        'nvprenom' => $prenom,
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


