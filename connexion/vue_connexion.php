<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HomeNiscience</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen and (max-width: 800px)" href="css/mobile.css" />
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 801px)" href="css/style.css" />
</head>
<body>
<div class="bg">

    <img class="imgHome" src="img/logo.png" alt="">
    <!-- Module de connexion -->

    <div class="connexion">
        <form method="POST" action="controler_connexion.php">
            <input class="txtinput" type="email" name="email" placeholder="Email">
            <br>
            <input class="txtinput" type="password" name="mot_de_passe" placeholder="Mot de passe">
            <input class="btn" type="submit">
        </form>
    </div>
    <!-- Créer un compte / mdp oublié -->
    <div class="links">
        <a href="controleur_oubli.php">Mot de passe oublié ?</a>
        <a href="../inscription/Vue/vue_inscription.php">Créer un compte</a>
    </div>
</div>
</body>
</html>