<?php

if(!isset($_SESSION)){
    session_start();
}

require('profil_modele.php');

$id_user = getUtilisateur($_SESSION['ID']);
$donnees = $id_user -> fetch();

if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email'])) {
    if ($_POST['email'] == $_POST['email2']){
        modifInfoUtilisateur($_POST['email'],$_POST['nom'],$_POST['prenom'],$_SESSION['ID']);
    }
    else{
        echo 'E-mail non identiques';
    }
}
else{
    echo 'Tous les champs doivent être remplis';
}

$id_user_mdp = getMdpUtilisateur($_SESSION['ID']);
$bdd_mdp = $id_user_mdp -> fetch();

if(!empty($_POST['OldMdp'])){
    $mdp_client = $_POST['OldMdp'];
    if(password_verify($mdp_client, $bdd_mdp['mot_de_passe'])){
        if($_POST['NewMdp'] == $_POST['NewMdp2']){
            modifMdpUtilisateur($_POST['NewMdp'], $_SESSION['ID']);
        }
        else{
            echo 'Mots de passe non identiques';
        }
    }
    else{
        echo 'Mauvais mot de passe';
    }
}

require('Profil.php');




