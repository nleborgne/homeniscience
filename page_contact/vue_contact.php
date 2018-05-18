<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>
<head>
    <link rel="stylesheet" href="vue_contact.css"/>
    <meta charset="utf-8">
    <title>Contact</title>
</head>

<body>
<?php
require ('../page/header.php')
?>
<div class="formulaire">
<form method="post" action="traitement_contact.php">
    <p>
        <label for="titre">
            Quelle.s question.s souhaitez-vous nous demander ?
        </label>
        <br />

        <textarea name="titre" id="titre" rows="10" cols="50">Votre message
       </textarea> <br/>
        <input type="submit" value="Envoyer" />
    </p>
</form>
</div>
</body>
</html>

