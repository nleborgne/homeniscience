<?php


$ID_utilisateur_principal=1;

require('domicile-model.php');

try {
    $ID_domicile=ID_domicile($ID_utilisateur_principal);

    $domicile = Affdomicile($ID_utilisateur_principal);
    $piece= Affpiece($ID_domicile);
    $piece_ajoutées= Affpiece($ID_domicile);

    $reponse_piece=Affpiece($ID_domicile);
    $reponse_capteur=Afftypecapt();

    $capt= Affcapt($ID_domicile);
    $equipement_ajoutés=Affcapt($ID_domicile);

    $reponse_ajout= Affuseradd($ID_domicile);
    $reponse_utilisateurs=Affuseradd($ID_domicile);
    require('domicile.php');

}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}


?>