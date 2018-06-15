<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="Profil.css">
    <title>Profil</title>
</head>
<?php require ('../header.php'); ?>
<body>
<div class="container">
<div class="flex2">
    <button class="accordion" type="button" name="button">Modifier votre profil</button>
    <div class="panel">
        <h2 class="profil_modifier">Mon profil</h2>
        <form method="post" action="Index.php">
            <fieldset>
                <legend> Modifier le nom et le prénom </legend>
                <div class="row">
                    <div class="col-25">
                        <label for="prenom">Prénom</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="prenom" name="prenom" value="<?php echo $donnees['prenom']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="nom">Nom</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nom" name="nom" value="<?php echo $donnees['nom']?>">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend> Modifier l'email </legend>
                <div class="row">
                    <div class="col-25">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="email" name="email" value="<?php echo $donnees['email']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="email2">Confirmer e-mail</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="email2" name="email2" value="">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Modifier mot de passe</legend>
                <div class="row">
                    <div class="col-25">
                        <label for="OldMdp">Ancien mot de passe</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="OldMdp" name="OldMdp" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="NewMdp">Nouveau mot de passe</label>
                    </div>
                    <div class="col-75">
                        <input class="champ" type="password" id="NewMdp" name="NewMdp" onkeyup="verificationMdp()">
                        <div id="erreur_mdp1" class="erreur_mdp1"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="NewMdp2">Confirmer mot de passe</label>
                    </div>
                    <div class="col-75">
                        <input class="champ" type="password" id="NewMdp2" name="NewMdp2" onkeyup="verifDouble(this)">
                        <div id="erreur_mdp2" class="erreur_mdp2"></div>
                    </div>
                </div>
            </fieldset>
            <div class="row">
                <input type="submit" value="Modifier">
            </div>
        </form>
    </div>
</div>
</div>
<script>
    function verificationMdp(){
        champ = document.getElementById("NewMdp");
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
        mdp1 = document.getElementById("NewMdp").value;
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
<footer style="position: inherit">
    <?php require ('../footer.php')?>
</footer>
</html>