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
    $bdd = new PDO('mysql:host=localhost;dbname=site_test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}




if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['code_postal']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['mdp']) && !empty($_POST['tel_port'])) /* condition pour que tous les champs soient remplis */
{
    $mdp_hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    $verif_email = $bdd -> query('SELECT * FROM Membres WHERE email = "$_POST[\'email\']"'); /*Partie SQL pour vérifier si le mail est deja présent dans la bdd*/
    if($verif_email->fetch() == $_POST['email']) {
        echo 'il existe deja un compte lié à cet email';
        include("Inscription.php"); /* redirection vers le formulaire*/
    }
    else if(($_POST['email'] != $_POST['email-confirm']) || ($_POST['mdp'] != $_POST['mdp-confirm']))
    {
        echo "Veuillez verifier que vous avez bien rempli deux fois votre adresse email et votre mot de passe correctement"; /* message affiché si les champs à remplir deux fois sont incorrectes */
        include("Inscription.php"); /* redirection vers le formulaire*/
    }

    else
    {
        echo $nom = $_POST['nom'];echo('<br>');
        echo $prenom = $_POST['prenom'];echo('<br>');
        echo  $email = $_POST['email'];echo('<br>');
        echo  $adresse = $_POST['adresse'];echo('<br>');
        echo $code_postal = $_POST['code_postal'];echo('<br>');
        echo  $ville = $_POST['ville'];echo('<br>');
        echo  $pays = $_POST['pays'];echo('<br>');
        echo  $tel_port = $_POST['tel_port'];echo('<br>');
        echo  $tel_fixe = $_POST['tel_fixe'];echo('<br>');

        $requete = $bdd ->prepare('INSERT INTO membres(nom ,prenom, email, adresse, code_postal, ville, pays, mdp_hash, tel_port, tel_fixe)
                                            VALUES(:nom,:prenom,:email,:adresse,:code_postal,:ville,:pays,:mdp_mash,:tel_port,:tel_fixe)');
        $requete ->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'adresse' => $adresse,
            'code_postal' => $code_postal,
            'ville' => $ville,
            'pays' => $pays,
            'mdp_hash' => $mdp_hash,
            'tel_port' => $tel_port,
            'tel_fixe' => $tel_fixe
        ));

        echo 'membre bien enregistré';
    }
}


else
{
    echo "Vous n'avez pas rempli tous les champs necessaires"; /* message affichant que des champs manques */
    include("Inscription.php"); /* redirection vers le formulaire*/
}
?>

</body>