<?php

   // set_include_path("homeniscience/inscription/inscription_mvc/Controller/functions_controller.php");
    include("functions_controller.php");
    include("../Model/model.php");
    $POST=htmlspe($_POST); /* On créer un nouveau tableau post inoffensif */
    $url = "/homeniscience/connexion/vue_connexion.php";

    if (test_remplissage($_POST)) { /* condition pour que tous les champs soient remplis */

        /* Partie pour chercher si l'email utilisé est déja présent dans la base de données */
        $query = check_mail($_POST);

        if ($query->rowCount() > 0) { /* Si les 'row' sont trouvés dans la requête, qui voudrait dire que l'email a été trouvé */
            echo "<p class='phrase2'>L'email utilisé est déja utilisé</p>";
            include("../Vue/vue_inscription.php"); /* redirection vers le formulaire*/
        } else if (test_equal($_POST)) /* Partie pour vérifier si les champs à double entrées sont bien remplis */ {
            echo "<p class='phrase2'>Veuillez verifier que vous avez bien rempli deux fois votre adresse email et votre mot de passe correctement</p>"; /* message affiché si les champs à remplir deux fois sont incorrectes */
            include("../Vue/vue_inscription.php"); /* redirection vers le formulaire*/
        }



        else {
            /* Requête qui permet d'ajouter un utilisateur dans la base de donnée avec tous les attributs nécessaires */

            inscription_bdd($_POST);

            /* Redirection vers la page de menu une fois que l'utilisateur a créé son compte */
            header('Location: ' . $url);
        }
    }
    else {
        echo "<p class='phrase2'>Vous n'avez pas rempli tous les champs necessaires</p>"; /* message affichant que des champs manques */
        include("../index.php"); /* redirection vers le formulaire*/
    }

?>
