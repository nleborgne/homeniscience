<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
</head>

<body>
    <?php
    $membres = array('Jean', 'Jacques', 'Michel', 'Paul', 'Patrick');
    $MDP = "kangourou";
    if (isset($_POST['Login']) && isset($_POST['MdP']))
    {
        if(in_array($_POST['Login'], $membres) && $MDP == $_POST ['MdP'])
        {
            echo "voici les données : The cake is a lie";
        }
        else
        {
            echo "Vous vous êtes trompé de login ou de mot de passe !";
            include("NASA.php");
        }
    }
    else
    {
        echo "remplissez tous les champs !";
        include("NASA.php");
    }
    ?>
</body>
</html>