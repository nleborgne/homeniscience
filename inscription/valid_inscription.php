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
    $bdd = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', 'tristank');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$url = "../accueil/accueil_vue.php";


if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) ) /* condition pour que tous les champs soient remplis */
{

    $verif_email = $bdd -> query('SELECT * FROM utilisateur WHERE email = "$_POST[\'email\']"'); /*Partie SQL pour vérifier si le mail est deja présent dans la bdd*/
    if($verif_email->fetch() == $_POST['email']) {
        echo 'il existe deja un compte lié à cet email';
        include("Inscription.php"); /* redirection vers le formulaire*/
    }
    else if(($_POST['email'] != $_POST['email-confirm']) || ($_POST['mdp'] != $_POST['mdp-confirm']))
    {
        echo "Veuillez verifier que vous avez bien rempli deux fois votre adresse email et votre mot de passe correctement"; /* message affiché si les champs à remplir deux fois sont incorrectes */
        include("Inscription.php"); /* redirection vers le formulaire*/
    }

    else {
        /*
    $requete = $bdd ->prepare('INSERT INTO utilisateur(email, mot_de_passe, nom, prenom) VALUES(:email, :mdp_hash, :nom, :prenom)');
    $requete ->execute(array(
        'email' => $_POST['email'],
        'mdp_hash' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom']

        ));
        */
        $requete = $bdd ->prepare('INSERT INTO utilisateur (ID_domicile, email, mot_de_passe, nom, prenom, adresse, numero_fixe, numero_mobile, ID_type_utilisateur, ID_langue, image, ID_theme, ID_mode_paiement)
                                VALUES (:ID_domicile, :email, :mot_de_passe, :nom, :prenom, :adresse, :numero_fixe, :numero_mobile, :ID_type_utilisateur, :ID_langue, :image, :ID_theme, :ID_mode_paiement)');
        $requete ->execute(array(
            'ID_domicile' =>0,
            'email' => $_POST['email'],
            'mot_de_passe' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
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


        echo "incription réussie";
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();

    }
}


else
{
    echo "Vous n'avez pas rempli tous les champs necessaires"; /* message affichant que des champs manques */
    include("Inscription.php"); /* redirection vers le formulaire*/
}
?>

</body>
