<!DOCTYPE html>
<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Validation inscription</title>
    <link rel="stylesheet" href="../css/valid_inscription.css" />
</head>

<body>
<?php
connexion_bdd();


$url = "../../connexion/vue_connexion.php";


if(test_remplissage($_POST)) /* condition pour que tous les champs soient remplis */
{
    htmlspe($_POST);

    /* Partie pour chercher si l'email utilisé est déja présent dans la base de données */
    $query=check_mail($bdd,$_POST);

    if( $query->rowCount() > 0 ) { /* Si les 'row' sont trouvés dans la requête, qui voudrait dire que l'email a été trouvé */
        echo "L'email utilisé est déja utilisé";
        include("../Vue/vue_inscription.php"); /* redirection vers le formulaire*/
    }
    else if(test_equal($_POST)) /* Partie pour vérifier si les champs à double entrées sont bien remplis */
    {
        echo "Veuillez verifier que vous avez bien rempli deux fois votre adresse email et votre mot de passe correctement"; /* message affiché si les champs à remplir deux fois sont incorrectes */
        include("../Vue/vue_inscription.php"); /* redirection vers le formulaire*/
    }

    else {
        /* Requête qui permet d'ajouter un utilisateur dans la base de donnée avec tous les attributs nécessaires */

        inscription_bdd($_POST);

        /* Redirection vers la page de menu une fois que l'utilisateur a créé son compte */
        session_start();
        header('Location: '.$url);


    }
}


else
{
    echo "Vous n'avez pas rempli tous les champs necessaires"; /* message affichant que des champs manques */
    include("../Vue/vue_inscription.php"); /* redirection vers le formulaire*/
}
?>

</body>
