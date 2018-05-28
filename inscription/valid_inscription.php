<!DOCTYPE html>
<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Validation inscription</title>
    <link rel="stylesheet" href="css/valid_inscription.css" />
</head>

<body>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$url = "../connexion/vue_connexion.php";


if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) ) /* condition pour que tous les champs soient remplis */
{
    /* Partie pour chercher si l'email utilisé est déja présent dans la base de données */
    $query = $bdd->prepare( "SELECT email FROM utilisateur WHERE email = ?" );
    $query->bindValue( 1, $_POST['email']);
    $query->execute();

    if( $query->rowCount() > 0 ) { /* Si les 'row' sont trouvés dans la requête, qui voudrait dire que l'email a été trouvé */
        echo "L'email utilisé est déja utilisé";
        include("Inscription.php"); /* redirection vers le formulaire*/
    }
    else if(($_POST['email'] != $_POST['email-confirm']) || ($_POST['mdp'] != $_POST['mdp-confirm'])) /* Partie pour vérifier si les champs à double entrées sont bien remplis */
    {
        echo "Veuillez verifier que vous avez bien rempli deux fois votre adresse email et votre mot de passe correctement"; /* message affiché si les champs à remplir deux fois sont incorrectes */
        include("Inscription.php"); /* redirection vers le formulaire*/
    }

    else {

        /* Requête qui permet d'ajouter un utilisateur dans la base de donnée avec tous les attributs nécessaires */
        $hash =  password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        echo $hash;
        echo gettype($hash);
        $requete = $bdd ->prepare('INSERT INTO utilisateur (ID_domicile, email, mot_de_passe, nom, prenom, adresse, numero_fixe, numero_mobile, ID_type_utilisateur, ID_langue, image, ID_theme, ID_mode_paiement)
                                VALUES (:ID_domicile, :email, :mot_de_passe, :nom, :prenom, :adresse, :numero_fixe, :numero_mobile, :ID_type_utilisateur, :ID_langue, :image, :ID_theme, :ID_mode_paiement)');
        $requete ->execute(array(
            'ID_domicile' =>0,
            'email' => $_POST['email'],
            'mot_de_passe' => $hash,
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'adresse' =>'',
            'numero_fixe' =>'',
            'numero_mobile' =>'',
            'ID_type_utilisateur' =>2,
            'ID_langue' =>1,
            'image' =>'',
            'ID_theme' =>1,
            'ID_mode_paiement' =>1
        ));

        /* Redirection vers la page de menu une fois que l'utilisateur a créé son compte */

        header('Location: '.$url);


    }
}


else
{
    echo "Vous n'avez pas rempli tous les champs necessaires"; /* message affichant que des champs manques */
    include("Inscription.php"); /* redirection vers le formulaire*/
}
?>

</body>
