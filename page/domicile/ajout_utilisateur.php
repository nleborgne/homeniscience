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
<img src="usericone.png" style="height: 85px;width: 100px; display:inline-block">
<article>
<div class="formulaire">
    <h4>rechercher et ajouter un utilisateur</h4>
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
    <br>
    <form method="POST">

        <select class="select-style" id="piece" name="user" required>

            <?php
            $reponse_ajout = $bdd->query("SELECT email FROM utilisateur WHERE nom='".$recherche."'  ");
            while ($donnees_utilisateurs = $reponse_ajout->fetch()){
                ?>
                <option value="<?php echo $donnees_utilisateurs['email'] ; ?>"> <?php echo $donnees_utilisateurs['email']; ?> </option>
                <?php
            }
            ?>


        <input class="boutton" type="submit" name="Valider" value="Valider" >

        <?php
        if(isset($_POST['Valider'])) {
                $mail= $_POST['user'];
                $sql = "UPDATE utilisateur SET ID_domicile=$ID_domicile WHERE email=:email";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array(
                        'email' => $mail
                ));

         }
        ?>

    </form>
</div>
<div class="formulaire">
    <form method="POST">
        <h4>supprimer un utilisateur</h4>
        <select class="select-style" id="piece" name="member" required>

            <?php
            $reponse_ajout = $bdd->query("SELECT prenom,ID FROM utilisateur WHERE ID_domicile=$ID_domicile  ");
            while ($donnees_utilisateurs = $reponse_ajout->fetch()){
                ?>
                <option value="<?php echo $donnees_utilisateurs['ID'] ; ?>"> <?php echo $donnees_utilisateurs['prenom']; ?> </option>
                <?php
            }
            ?>


            <input class="boutton" type="submit" name="Supp" value="Supprimer" >

            <?php
            if(isset($_POST['Supp'])) {
                $member= $_POST['member'];
                $sql = "UPDATE utilisateur SET ID_domicile=0 WHERE ID=:ID";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array(
                    'ID' => $member
                ));

            }
            ?>

    </form>
</div>
</article>
    <br>
    <br>
        <?php $reponse_utilisateurs = $bdd->query("SELECT prenom FROM utilisateur WHERE ID_domicile=$ID_domicile ORDER BY ID");
        while ($utilisateurs = $reponse_utilisateurs->fetch()){
            ?>
            <p style="box-shadow: 2px 2px 5px rgba(0, 0, 0, .1);" ><?php echo $utilisateurs['prenom']; ?></p>




            <?php
        }
        ?>








</body>