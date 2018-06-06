<?php

if(!isset($_SESSION)){
    session_start();
}

require('profil_modele.php');

$id_user = getUtilisateur($_SESSION['ID']);
$donnees = $id_user -> fetch();

//modifier le nom
if(isset($_POST['prenom']) && isset($_POST['nom'])) {
    modifNomUtilisateur($_POST['nom'],$_POST['prenom'],$_SESSION['ID']);
    header('Refresh:0');
}

//modifier l'email
if(isset($_POST['email'])){
    if($_POST['email'] == $_POST['email2']){
        modifEmailUtilisateur($_POST['email'],$_SESSION['ID']);
        header('Refresh:0');
    }
}

//modifier mot de passe
$id_user_mdp = getMdpUtilisateur($_SESSION['ID']);
$bdd_mdp = $id_user_mdp -> fetch();
if(!empty($_POST['OldMdp'])){
    $mdp_client = $_POST['OldMdp'];
    if(password_verify($mdp_client, $bdd_mdp['mot_de_passe'])) {
        if ($_POST['NewMdp'] == $_POST['NewMdp2']) {
            $hash =  password_hash($_POST['NewMdp'], PASSWORD_DEFAULT);
            modifMdpUtilisateur($hash, $_SESSION['ID']);
        }
    }
}


require('Profil.php');




