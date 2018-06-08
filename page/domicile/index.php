<?php
if(!isset($_SESSION)){
  session_start();
  $ID_utilisateur_principal=$_SESSION['ID'];
}

require('domicile-model.php');

try {
    //$ID_domicile=ID_domicile($ID_utilisateur_principal);  //recupere ID_domicile si l'utilisateur principale a deja defini son domicile O sinon
    $ID_domicile=ID_domicile2($ID_utilisateur_principal);
    $domicile = Afficher_domicile($ID_domicile);
    $piece = Afficher_piece($ID_domicile);
    $piece_ajoutées = Afficher_piece($ID_domicile);
    $kay=Verification_domicile($ID_domicile);
    if(strlen($kay)<2) {
        Verification_utilisateur($ID_utilisateur_principal);
    }
    verifcation_acces( ID_type($ID_utilisateur_principal));
    /*if(!empty($_POST['nom']) AND !empty($_POST['rue'])  AND !empty($_POST['size']) ) {

        Supprimer_domicile($ID_domicile);
        header('Location:../domicile/index.php#home');

    }*/

    if(isset($_POST['Suprimer'])) {
        Supprimer_piece($ID_domicile);
        header('Location:../domicile/index.php#home');

    }


    if(isset($_POST['ajouter'])){
        if(!empty($_POST['nom']) AND !empty($_POST['rue'])  AND !empty($_POST['size']) ) {
            Supprimer_domicile($ID_domicile);
            //Ajouter_domicile($ID_utilisateur_principal);
            Ajouter_domicile2($ID_utilisateur_principal);
            header('Location:../domicile/index.php#home');
        }
    }

    if(isset($_POST['ajoutpiece'])){
        if(!empty($_POST['piece'])) {

           Ajouter_piece($ID_domicile);
            header('Location:../domicile/index.php#home');
        }};

    $p =Afficher_piece($ID_domicile); //affichage des pieces
    $reponse_piece = Afficher_piece($ID_domicile);//affichage piece
    $cemac = Afficher_cemac($ID_domicile); //affichage des cemac
    $cemac2 = Afficher_cemac($ID_domicile); //affichage des cemac
    $reponse_capteur = Afficher_type_capteur(); //afficher les type des capteurs
    $capt = Afficher_capteur($ID_domicile);
    $equipement_ajoutés = Afficher_capteur($ID_domicile) ;
    if(isset($_POST['addc'])){  //supprimage des cemac
        if(!empty($_POST['numero'])) {

            Ajouter_cemac();
            header('Location:../domicile/index.php#gear');
        }
    }

    if(isset($_POST['delce'])) {

        Supprimer_cemac();
        header('Location:../domicile/index.php#gear');

    }

    if(isset($_POST['add'])){
        if(!empty($_POST['nom'])) {

            Ajouter_capteur();
            header('Location:../domicile/index.php#gear');
        }
    }

    if(isset($_POST['dell'])) {

        Supprimer_capteur();
        header('Location:../domicile/index.php#gear');

    }



    $reponse_ajout = Afficher_email();
    $reponse_ajout2 = Afficher_utilisateur($ID_domicile);
    $reponse_utilisateurs = Afficher_utilisateur($ID_domicile);
    $reponse_ajout3 = Afficher_utilisateur($ID_domicile);
    $reponse_ajout4 = Afficher_utilisateur_principal($ID_domicile);
    $reponse_utilisateurs2 = Afficher_utilisateur_principal($ID_domicile);
    if(isset($_POST['Valider'])) {
        Ajouter_utilisateur($ID_domicile);
        header('Location:../domicile/index.php#user');

    }

    if(isset($_POST['Supp'])) {
        Supprimer_utilisateur();
        header('Location:../domicile/index.php#user');
    }

    if(isset($_POST['admin'])) {
        Ajouter_utilisateur_principal();
        header('Location:../domicile/index.php#user');

    }

    if(isset($_POST['SuppAdmin'])) {
        Supprimer_utilisateur_principal();
        header('Location:../domicile/index.php#user');
    }


  require('domicile.php');

}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}


