<!DOCTYPE html>
<head>
    <title> "Inscription" </title>
    <link rel="stylesheet" href="/homeniscience/inscription/css/css_inscription.css" />
    <meta charset="utf-8" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="bg">
    <img class="imgHome" src="/homeniscience/inscription/img/logo.png" alt="logo_home">
    <p class="phrase1">Complétez le formulaire pour créer votre compte</p>
    <!-- création formulaire d'inscription avec tous les champs à remplir -->
    <div class="formulaire_connexion">
        <form action= "/homeniscience/inscription/Controller/inscription.php" method = "post">
            <input class="champ" type="text" name="nom" id="nom" placeholder="Nom" required>
            <input class="champ" type="text" name="prenom" id="prenom" placeholder="Prenom" required>
            <input class="champ" type="email" name="email" id="email" placeholder="E-mail" required>
            <input class="champ" type="email" name="email_verif" id="email_verif" placeholder="Confirmation e-mail" required>
            <input class="champ" type="password" name="mdp" id="mdp" placeholder="Mot de passe" onkeyup="verificationMdp(this)">
            <div id="erreur_mdp1" class="erreur_mdp1"></div>
            <input class="champ" type="password" name="mdp_verif" id="mdp_verif" placeholder="Confirmation mot de passe" onkeyup="verifDouble(this)">
            <div id="erreur_mdp2" class="erreur_mdp2"></div>
            <div class="cgu">

                <input type="checkbox" name="cgu" id="cgu" required> <label for="cgu">J'accepte les <a href="/homeniscience/Doc administratif/controlleur_cgu.php" target="_blank">CGU</a></label>

            </div>
            <div class="cgu">
                <input type="checkbox" name="cgu" id="cgu" required> <label for="cgu">J'ai au mois 16 ans</label>
            </div>
            <div class="g-recaptcha" data-sitekey="6LevW1YUAAAAAEQ-hWFFC_3QnQQ8MOj2ph4Z-qDr" ></div>
            <input class="boutton" type = "submit" value = "Valider">
    </div>
    <div class="lien_connexion"> <a href="/homeniscience/connexion/vue_connexion.php">Vous avez déjà un compte ?</a> </div>
</div>
<script>
    function verificationMdp(champ){
        var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})");

        if(!regex.test(champ.value) && champ.value > 0){
            document.getElementById("erreur_mdp1").innerHTML = "Veuillez rentrer un mot de passe contenant au moins une majuscule et un chiffre de longueur supérieur";
            champ.style.borderColor = "#EA4335";
        }

        else {
            champ.style.borderColor = "#3a768f";
            document.getElementById("erreur_mdp1").innerHTML = "";
        }
    }
    function verifDouble(champ){
        mdp1 = document.getElementById("mdp").value;
        mdp2 = champ.value;
        if(mdp1 != mdp2){
            champ.style.borderColor = "#EA4335";
            document.getElementById("erreur_mdp2").innerHTML = "Veuillez rentrer le même mot de passe dans les deux champs";
        }
        else {
            champ.style.borderColor = "#3a768f";
            document.getElementById("erreur_mdp2").innerHTML = "";
        }
    }
</script>
</body>