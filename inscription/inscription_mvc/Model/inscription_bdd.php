<?php

function inscription_bdd(array $post){
    global $bdd;
    /*Initialisations de toutes les valeurs par defaut pour les bindParam*/
    $ID_domicile=0;
    $num_fixe='';
    $num_mobile='';
    $ID_type_utilisateur=2;
    $ID_langue=1;
    $image='';
    $ID_theme=1;
    $ID_mode_payement=1;
    /*hashage du mot de passe*/
    $hash =  password_hash($post['mdp'], PASSWORD_DEFAULT);

    $requete = $bdd->prepare('INSERT INTO utilisateur (ID_domicile, email, mot_de_passe, nom, prenom, adresse, numero_fixe, numero_mobile, ID_type_utilisateur, ID_langue, image, ID_theme, ID_mode_paiement)
                                VALUES (:ID_domicile, :email, :mot_de_passe, :nom, :prenom, :adresse, :numero_fixe, :numero_mobile, :ID_type_utilisateur, :ID_langue, :image, :ID_theme, :ID_mode_paiement)');
    /*bindParam sur tous les paramètres à rentrer dans la requête, pour eviter les injections SQL*/
    $requete->bindParam('ID_domicile', $ID_domicile,PDO::PARAM_INT);
    $requete->bindParam('email', $post['email'],PDO::PARAM_STR);
    $requete->bindParam('mot_de_passe',$hash);
    $requete->bindParam('nom', $post['nom'],PDO::PARAM_STR);
    $requete->bindParam('adresse', $post['adresse'],PDO::PARAM_STR);
    $requete->bindParam('numero_fixe', $num_fixe,PDO::PARAM_INT);
    $requete->bindParam('numero_mobile',$num_mobile,PDO::PARAM_INT);
    $requete->bindParam('ID_type_utilisateur', $ID_type_utilisateur,PDO::PARAM_INT);
    $requete->bindParam('ID_langue',$ID_langue,PDO::PARAM_INT);
    $requete->bindParam('image', $image,PDO::PARAM_STR);
    $requete->bindParam('ID_theme',$ID_theme,PDO::PARAM_INT);
    $requete->bindParam('ID_mode_paiement',$ID_mode_payement,PDO::PARAM_INT);
    $requete->execute();
}