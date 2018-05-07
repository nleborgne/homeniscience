<!DOCTYPE html>
<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Validation inscription</title>
    <link rel="stylesheet" href="ajout_capteur.css" />
</head>

<body>
    <?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=site-domisep;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $id_utilisateur = 13;

    if (!isset($_POST['piece']) && !isset($_POST['type_capteur'])){
        ?>
        <div class="formulaire">
            <form class="add_capt" method="post" action="ajout_capteur.php">
                <input class="champ" type="text" id="nom" name="nom" placeholder="Nom equipement" required>
                <select class="selection" id="piece" name="piece" required>
                    <?php $reponse_piece = $bdd->query("SELECT nom FROM piece JOIN utilisateur ON piece.ID_domicile = utilisateur.ID_domicile WHERE utilisateur.ID = '$id_utilisateur'");
                    while ($donnees_piece = $reponse_piece->fetch()){
                        ?>
                        <option value="<?php echo $donnees_piece['nom']; ?>"> <?php echo $donnees_piece['nom']; ?> </option>
                        <?php
                    }
                    ?>
                </select>
                <select class="selection" id="type_capteur" name="type_capteur" required>
                    <?php $reponse_capteur = $bdd->query("SELECT nom_type FROM type_equipement ORDER BY ID");
                    while ($donnees_capteur = $reponse_capteur->fetch()){
                        ?>
                        <option value="<?php echo $donnees_capteur['nom_type']; ?>"> <?php echo $donnees_capteur['nom_type']; ?> </option>
                        <?php
                    }
                    ?>
                </select>
                <input class="boutton" type="submit" value="Valider">
            </form>
        </div>
    <?php
    }
    else{
//$req_ajout_capteur = $bdd->prepare("UPDATE ")
    }
    ?>

</body>