<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>EasterEgg</title>
</head>
<body>
<div class="egg">
<h1>Vous vouliez en savoir plus sur nous ?</h1>
<h2>Alors voici un poney qui fait du moonwalk !</h2>
<img src="/homeniscience/page/image/poney.gif">
</div>
<div class="door">
    <a href="../index.php"><img src="image/door.png" class="exit"></a>
</div>
</body>

<style media="screen">
    body{
        background: url("/homeniscience/page/image/easter-egg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    h1, h2{
        color: black;
    }

    .egg{
        background-color: rgba(255,255,255,0.5);
        width:600px;
        margin: auto;
        text-align: center;
        border-radius: 5px;
        padding: 10px;
        margin-top: 100px;
    }
    img{
        border-radius: 5px;
        background: none;
    }
    .door{
        position: fixed;
        bottom: 0;
        right: 0;
        margin: 10px;
    }
    .exit{
        width: 50px
    }
</style>