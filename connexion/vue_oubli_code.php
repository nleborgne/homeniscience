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
            <p>Un code vous a été envoyé à l'adresse : <?php echo $_GET['mail']?>. <br>Entrez le code reçu ci dessous pour réinitialiser votre mot de passe.</p>
            <form method="GET" action="controleur_oubli.php">
                <fieldset>
                    <legend> Entrez le code reçu par mail</legend>
                    <div class="row">
                        <div class="col-25">
                            <label for="code">Code</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="code" name="code" value="">
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <label for="mail2">
                        <input type="text" name="mail2"   style="display:none" value="<?php echo $_GET['mail']?> " >
                    </label>
                    <input type="submit" value="Envoyer le code">
                </div>
            </form>
        </div>
        <?php if(isset($error)) {echo $error;} ?>
    </div>
</div>

</body>
<footer style="position: inherit">
</footer>
</html>