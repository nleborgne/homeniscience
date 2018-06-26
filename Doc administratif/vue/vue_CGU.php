<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HomeNiscience</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/vue_cgu.css" />
</head>

<body>

<?php require('../../page/header.php'); ?>

<div class="block">
<div class="conteneur">
    <button class="accordion" type="button" name="button">Conditions générales</button>
    <div class="text">

        <?php echo $cgu["contenu"] ?>

    </div>
</div>
</div>

<?php require('../../page/footer.php'); ?>

</body>
</html>