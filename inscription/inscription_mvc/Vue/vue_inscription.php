<!DOCTYPE html>
<head>
    <title> "Inscription" </title>
    <link rel="stylesheet" href="../css/inscription.css" />
    <meta charset="utf-8" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="bg">
    <img class="imgHome" src="../img/logo.png" alt="logo_home">
    <p>Complétez le formulaire pour créer votre compte</p>
    <!-- création formulaire d'inscription avec tous les champs à remplir -->
    <div class="formulaire_connexion">
        <form action= "Controller/inscription.php" method = "post">
            <input class="champ" type="text" name="nom" id="nom" placeholder="Nom" required>
            <input class="champ" type="text" name="prenom" id="prenom" placeholder="Prenom" required>
            <input class="champ" type="email" name="email" id="email" placeholder="E-mail" required>
            <input class="champ" type="email" name="email-confirm" id="email-confirm" placeholder="Confirmation e-mail" required>
            <input class="champ" type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>
            <input class="champ" type="password" name="mdp-confirm" id="mdp-confirm" placeholder="Confirmation mot de passe" required>
            <div class="cgu">
                <input type="checkbox" name="cgu" id="cgu" required> <label for="cgu">J'accepte les <a href="">CGU</a></label>
            </div>
            <div class="g-recaptcha" data-sitekey="6LevW1YUAAAAAEQ-hWFFC_3QnQQ8MOj2ph4Z-qDr" ></div>
            <input class="boutton" type = "submit" value = "Valider">
    </div>
</div>

</body>