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
$mail='';
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
    <form method="POST">
        <select class="selection" id="piece" name="user" required>

            <?php
            $reponse_ajout = $bdd->query("SELECT email FROM utilisateur WHERE nom='".$recherche."'  ");
            while ($donnees_utilisateurs = $reponse_ajout->fetch()){
                ?>
                <option value="<?php echo $donnees_utilisateurs['email'] ; ?>"> <?php echo $donnees_utilisateurs['email']; ?> </option>
                <?php
            }
            ?>
        </select>

        <input class="boutton" type="submit" name="Valider" value="Valider">

        <?php
        if(isset($_POST['Valider'])) {
                $mail= $_POST['user'];
                $sql = "UPDATE utilisateur SET ID_domicile=1 WHERE email=:email";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array(
                        'email' => $mail
                ));

         }
        ?>

    </form>


    <select class="selection2" id="invité" name="invité" required>
        <?php $reponse_utilisateurs = $bdd->query("SELECT prenom FROM utilisateur WHERE ID_domicile=1 ORDER BY ID");
        while ($utilisateurs = $reponse_utilisateurs->fetch()){
            ?>
            <option value="<?php echo $utilisateurs['prenom']; ?>"> <?php echo $utilisateurs['prenom']; ?> </option>
            <?php
        }
        ?>
    </select>

</div>
</body>