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
            <h2 class="profil_modifier">Réinitialiser votre mot de passe</h2>
            <p>Renseignez ci-dessous votre adresse mail.<br> Vous recevrez un code vous permettant de réinitialiser votre mot de passe si vous êtes inscrit sur le site.</p>
            <form method="GET" action="controleur_oubli.php">
                <fieldset>
                    <legend> Entrez votre adresse e-mail</legend>
                    <div class="row">
                        <div class="col-25">
                            <label for="prenom">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="mail" name="mail" value="">
                        </div>
                    </div>
                </fieldset>

                <div class="row">

                    <input type="submit" value="Envoyer le code">
                </div>
                <a href="vue_connexion.php">Retour</a>
            </form>
        </div>
    </div>
</div>

</body>
<footer style="position: inherit">
</footer>
</html>