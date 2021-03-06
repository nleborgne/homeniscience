<!DOCTYPE html>
<!-- trying to code a homepage for support section -->
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Support - Index</title>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <link rel="stylesheet" href="/homeniscience/admin/vue/style_index.css">
</head>
<?php require('../header2.php'); ?>
<body>
<div class="container">
    <a href="../panne/index.php?id=0">
        <div class="child">
            <i class="fas fa-exclamation-triangle fa-5x"></i>
            <h3>GÉRER LES PANNES</h3>
        </div>
    </a>
    <a href="../controleur/controleur_chat.php?id=0">
        <div class="child chat">
            <i class="fas fa-comment fa-5x"></i>
            <h3>CHAT</h3>
        </div>
    </a>
    <a href="../controleur/settings_controleur.php">
        <div class="child other">
            <i class="fas fa-cog fa-5x"></i>
            <h3>PARAMÈTRES</h3>
        </div>
    </a>
</div>
</body>
<footer style="position: inherit">
    <?php require('../../page/footer.php') ?>
</footer>
</html>
