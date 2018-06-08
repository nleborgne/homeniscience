<!DOCTYPE html>
<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>ajout piece</title>
    <link rel="stylesheet" href="ajout.css">
</head>

<body>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$recherche=' ';
$mail='';
?>
<br>
<img src="usericone.png" style="height: 100px;width: 100px; display:inline-block">
<article>
<div class="formulaire">
    <h4>Rechercher et ajouter un utilisateur</h4>
    <form class="add_capt" method="post" action="index.php">
        <input class="champ" type="text" id="nom" name="nom" placeholder="utilisateurs a rechercher" required>
        <input class="boutton" type="submit" name="recherche" value="Rechercher">
        <?php

        if(isset($_POST['recherche'])){
           if(!empty(isset($_POST['nom']))) {
               $recherche = $_POST['nom'];

           }
        }
        ?>
    </form>
    <br>
    <form method="POST">

        <select class="select-style" id="piece" name="user" required>

            <?php

            while ($donnees_utilisateurs = $reponse_ajout->fetch()){
                ?>
                <option value="<?php echo $donnees_utilisateurs['email'] ; ?>"> <?php echo $donnees_utilisateurs['email']; ?> </option>
                <?php
            }
            ?>



        <input class="boutton" type="submit" name="Valider" value="Valider" >
    </form>
</div>
<div class="formulaire">
    <form method="POST">
        <h4>Supprimer un utilisateur</h4>
        <select class="select-style" id="piece" name="member" required>
            <option value="NULL"> Sélectionnez </option>
            <?php

            while ($donnees_utilisateurs = $reponse_ajout2->fetch()){
                ?>
                <option value="<?php echo $donnees_utilisateurs['ID'] ; ?>"> <?php echo $donnees_utilisateurs['prenom']; ?> </option>
                <?php
            }
            ?>


            <input class="boutton" type="submit" name="Supp" value="Supprimer" >
    </form>
</div>
</article>
    <br>
    <br>
        <?php
        while ($utilisateurs = $reponse_utilisateurs->fetch()){
            ?>
            <p style="/*box-shadow: 2px 2px 5px rgba(0, 0, 0, .1);*/" ><?php echo $utilisateurs['prenom']; ?></p>




            <?php
        }
        ?>







<article>
    <div class="formulaire">

        </form>

        <form method="POST">
            <h4>Ajouter un utilisateur principal</h4>
            <select class="select-style" id="piece" name="princip" required>
                <option value="NULL"> Sélectionnez  </option>
                <?php

                while ($donnees_utilisateurs = $reponse_ajout3->fetch()){
                    ?>
                    <option value="<?php echo $donnees_utilisateurs['ID'] ; ?>"> <?php echo $donnees_utilisateurs['prenom']; ?> </option>
                    <?php
                }
                ?>


                <input class="boutton" type="submit" name="admin" value="Ajouter" >
        </form>
    </div>
    <div class="formulaire">
        <form method="POST">
            <h4>Supprimer un utilisateur principal</h4>
            <select class="select-style" id="piece" name="noprincip" required>
                <option value="NULL"> Sélectionnez  </option>
                <?php

                while ($donnees_utilisateurs = $reponse_ajout4->fetch()){
                    ?>
                    <option value="<?php echo $donnees_utilisateurs['ID'] ; ?>"> <?php echo $donnees_utilisateurs['prenom']; ?> </option>
                    <?php
                }
                ?>


                <input class="boutton" type="submit" name="SuppAdmin" value="Supprimer" >

        </form>
    </div>
</article>

<?php
while ($utilisateurs = $reponse_utilisateurs2->fetch()){
    ?>
    <p style="/*box-shadow: 2px 2px 5px rgba(0, 0, 0, .1);*/" ><?php echo $utilisateurs['prenom']; ?></p>




    <?php
}
?>





</body>