<!DOCTYPE html>
<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>ajout piece</title>
    <link rel="stylesheet" href="ajout_utilisateur.css" />
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
$recherche=' ';
?>
<div class="formulaire">
    <form class="add_capt" method="post">
        <input class="champ" type="text" id="nom" name="nom" placeholder="Nom d'utilisateurs a rechercher" required>
        <input class="boutton" type="submit" name="recherche" value="rechercher">
        <?php

        if(isset($_POST['recherche'])){
           if(!empty(isset($_POST['nom']))) {
               $recherche = $_POST['nom'];

           }
        }
        ?>
    </form>
    <form>
        <select class="selection" id="piece" name="piece" required>

            <?php
            $reponse_ajout = $bdd->query("SELECT nom,prenom FROM utilisateur WHERE nom='".$recherche."'  ");
            while ($donnees_utilisateurs = $reponse_ajout->fetch()){
                ?>
                <option value="<?php echo $donnees_utilisateurs['nom'] ; echo  $donnees_utilisateurs['prenom']; ?>"> <?php echo $donnees_utilisateurs['nom']; echo $donnees_utilisateurs['prenom']; ?> </option>
                <?php
            }
            ?>
        </select>
        <select class="selection" id="invité" name="invité" required>
            <?php $reponse_utilisateurs = $bdd->query("SELECT prenom FROM utilisateur WHERE ID_domicile=0 ORDER BY ID");
            while ($utilisateurs = $reponse_utilisateurs->fetch()){
                ?>
                <option value="<?php echo $utilisateurs['prenom']; ?>"> <?php echo $utilisateurs['prenom']; ?> </option>
                <?php
            }
            ?>
        </select>
        <input class="boutton" type="submit" value="Valider">
    </form>
</div>
</body>