<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="domicile2.0.css">
    <title>MON DOMICILE</title>
</head>
<?php require ('../../header.php'); ?>
<body>
<div class="container1" id="home" >
    <div class="container1">
        <div class="flex1"  >
            <form method="post" action="index.php">
            <button class="accordion" type="button" name="button" style="background-color: #ff9a00 ;color: white  ">Attention !!! </button>
            <div class="panel" >
                <img src="warning.png" style="height: 250px;width: 250px;margin-top: 200px; margin-left: 250px; margin-right: 250px; position: center">
                <P style="padding-left: 100px;padding-right: 100px"> Vous n'etes pas utilisateur principal de votre domicile, vous ne pouvez donc pas acceder cette page. <br> Vous pouvez contacter votre utilisateur principal si vous voulez en devenir un <br><br> Cliquez sur OK pour revenir a l'acceuil <b>;-)</b></P>
                <input class="boutton" type="submit" name="acceptez_lechec" value="OK" style=" margin-left: 325px; margin-right: 325px; position: center">

            </div>
            </form>
        </div>
    </div>

</div

</body>
<footer style="position: inherit">
    <?php require ('../../footer.php')?>
</footer>

</html>
