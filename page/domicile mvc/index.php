<?php
if(!isset($_SESSION)){
  session_start();
  $ID_utilisateur_principal=$_SESSION['ID'];
}

require('domicile-model.php');

try {
    $ID_domicile=ID_domicile($ID_utilisateur_principal);  //recupere ID_domicile si l'utilisateur principale a deja defini son domicile O sinon

    $domicile = Afficher_domicile($ID_domicile);
    $piece = Afficher_piece($ID_domicile);
    $piece_ajoutées = Afficher_piece($ID_domicile);

    if(!empty($_POST['nom']) AND !empty($_POST['rue'])  AND !empty($_POST['size']) ) {

        Supprimer_domicile();

    }

    if(isset($_POST['Suprimer'])) {
        Supprimer_piece($ID_domicile);

    }


    if(isset($_POST['ajouter'])){
        if(!empty($_POST['nom']) AND !empty($_POST['rue'])  AND !empty($_POST['size']) ) {

            Ajouter_domicile($ID_utilisateur_principal);
        }
    }

    if(isset($_POST['ajoutpiece'])){
        if(!empty($_POST['piece'])) {

           Ajouter_piece($ID_domicile);
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
        }
    }

    if(isset($_POST['delce'])) {

        Supprimer_cemac();

    }

    if(isset($_POST['add'])){
        if(!empty($_POST['nom'])) {

            Ajouter_capteur();
        }
    }

    if(isset($_POST['dell'])) {

        Supprimer_capteur();

    }



    $reponse_ajout = Afficher_email();
    $reponse_ajout2 = Afficher_utilisateur($ID_domicile);
    $reponse_utilisateurs = Afficher_utilisateur($ID_domicile);
    $reponse_ajout3 = Afficher_utilisateur($ID_domicile);
    $reponse_ajout4 = Afficher_utilisateur_principal($ID_domicile);
    $reponse_utilisateurs2 = Afficher_utilisateur_principal($ID_domicile);
    if(isset($_POST['Valider'])) {
        Ajouter_utilisateur($ID_domicile);

    }

    if(isset($_POST['Supp'])) {
        Supprimer_utilisateur();

    }

    if(isset($_POST['admin'])) {
        Ajouter_utilisateur_principal();

    }

    if(isset($_POST['SuppAdmin'])) {
        Supprimer_utilisateur_principal();
    }


  require('domicile.php');

}catch (Exception $e) {
  echo 'Erreur : '.$e->getMessage();
}


?>
