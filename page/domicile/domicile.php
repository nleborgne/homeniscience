<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="domicile2.0.css">
    <title>MON DOMICILE</title>
</head>
<?php require ('../header.php'); ?>
<body>
<div class="container1" >
    <div class="container1">
        <div class="flex1"  >
            <button class="accordion" type="button" name="button" style="background-color: #3cb0fd ;  ">Domicile</button>
            <div class="panel" >
                <?php require ('Ajout-domicile.php'); ?>
            </div>

        </div>
    </div>
    <div class="container1">
        <div class="flex1">
<<<<<<< HEAD
            <button class="accordion" type="button" name="button" style="color: white">CeMac</button>
=======
            <button class="accordion" type="button" name="button" style="background-color:#1887E6 ; ">Capteur</button>
>>>>>>> d81cdec9fded4a12b4a4fa5b1da56984bfa4d0b7
            <div class="panel" >
                <?php require ('ajout_capteur.php'); ?>
            </div>
        </div>
    </div>
    <div class="container1">
        <div class="flex1">
            <button class="accordion" type="button" name="button" >Utilisateurs</button>
            <div class="panel" >
                <?php require ('ajout_utilisateur.php'); ?>
            </div>
        </div>
    </div>
</div

</body>
<footer style="position: inherit">
    <?php require ('../footer.php')?>
</footer>

</html>
