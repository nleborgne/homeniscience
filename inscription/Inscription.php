<!DOCTYPE html>
<head>
    <title> "Inscription" </title>
    <link rel="stylesheet" href="css/inscription.css" />
    <meta charset="utf-8" />
</head>
<body>

<img class="imgHome" src="img/logo.png" alt="logo_home">
<p>Complétez le formulaire pour créer votre compte</p>
<!-- création formulaire d'inscription avec tous les champs à remplir -->
<div class="formulaire_connexion">
    <form action= "valid_inscription.php" method = "post">
        <input class="champ" type="text" name="nom" id="nom" placeholder="Nom">
        <input class="champ" type="text" name="prenom" id="prenom" placeholder="Prenom">
        <input class="champ" type="text" name="email" id="email" placeholder="e-mail">
        <input class="champ" type="text" name="email-confirm" id="email-confirm" placeholder="Confirmation e-mail">
        <input class="champ" type="text" name="adresse" id="adresse" placeholder="Adresse">
        <input class="champ" type="text" name="code_postal" id="code_postal" placeholder="Code postal">
        <input class="champ" type="text" name="ville" id="ville" placeholder="Ville">
        <input class="champ" type="text" name="pays" id="pays" placeholder="Pays">
        <input class="champ" type="password" name="mdp" id="mdp" placeholder="Mot de passe">
        <input class="champ" type="password" name="mdp-confirm" id="mdp-confirm" placeholder="Confirmation mot de passe">
        <input class="champ" type="tel" name="tel_port" id="tel_port" placeholder="Téléphone portable">
        <input class="champ" type="tel" name="tel_fixe" id="tel_fixe" placeholder="Télephone fixe">
        <input class="boutton" type = "submit" value = "Valider">
</div>

</body>