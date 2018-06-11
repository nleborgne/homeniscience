<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style_oubli.css">
    <title>Profil</title>
</head>
<body>
<div class="container">
    <div class="flex2">
        <button class="accordion" type="button" name="button">Mot de passe oublié</button>
        <div class="panel">
            <h2 class="profil_modifier">Nouveau mot de passe</h2>
            <p>Choisissez un nouveau mot de passe.<br> Il doit comporter au moins 8 caractères, une minuscule, une
                majuscule et un chiffre.</p>
            <form method="GET" action="controleur_oubli.php">
                <fieldset>
                    <legend> Entrez votre nouveau mot de passe</legend>
                    <div class="row">
                        <div class="col-25">
                            <label for="mdp">Mot de passe</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="mdp" name="mdp" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="mdp2">Mot de passe (confirmer)</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="mdp2" name="mdp2" value="">
                        </div>
                    </div>
                </fieldset>
                <label for="mail3">
                    <input type="text" name="mail3" value="<?php echo $_GET['mail2']?> " style="display:none" >
                </label>
                <div class="row">
                    <input type="submit" value="Envoyer le code">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<footer style="position: inherit">
</footer>
</html>