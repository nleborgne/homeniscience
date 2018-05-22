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
        <form method="post" >
            <?php
            while ($data = $req->fetch()) {
                ?>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Prénom</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="firstname" value="<?= htmlspecialchars($data['nom']); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Nom</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="lname" name="lastname" value="!PHP!">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="email" name="email" value="!PHP!">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="email2">Confirmer e-mail</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="email2" name="email2" value="!PHP!">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="mdp">Mot de passe</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="mdp" name="mdp" value="!PHP!">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="mdp2">Confirmer mot de passe</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="mdp2" name="mdp2" value="!PHP!">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Modifier">
                </div>
                <?php
            }
            $req->closeCursor();
            ?>
        </form>
    </div>
</div>
</div>

</body>
<footer style="position: inherit">
    <?php require ('../footer.php')?>
</footer>

</html>