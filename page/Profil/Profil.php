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
        <h2 class="Inscription">Inscription à la Newsletter</h2>
        <form method="post" >
            <label for="nom" class="label">Nom</label><br />
            <input type="text" name="nom" id="nom" value="!PHP!">
            <br />
            <label for="prenom" class="label">Prénom</label><br />
            <input type="text" name="prenom" id="prenom" value="!PHP!">
            <br />
            <label for="email" class="label">E-mail</label><br />
            <input type="email" name="email" id="email" value="!PHP!">
            <br />
            <input id="submit" type="submit" value="Enregistrer">
        </form>
    </div>
</div>
</div>

</body>
<footer style="position: inherit">
    <?php require ('../footer.php')?>
</footer>

</html>