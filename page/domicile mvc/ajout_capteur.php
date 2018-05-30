<?php
if(!isset($_SESSION)){
  session_start();
  $ID_utilisateur_principal=$_SESSION['ID'];
}
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Ajouter capteur</title>
    <link rel="stylesheet" href="ajout.css" />
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
    ?>

    <div style="display:flex;flex-wrap: nowrap">
        <img src="sensorsicon.png" style="height: 100px;width: 100px; margin: 10px ">
        <div style="display: inline-block">
            <?php

            while ($cem = $cemac->fetch()){
                ?>
                <h3 style="box-shadow: 2px 2px 5px rgba(0, 0, 0, .1); font-size: 28px;padding: 10px "><?php echo 'CeMac num:','  ', '  ',$cem['nom']; ?></h3>
                <?php
            }
            ?>



        </div>
    </div>

    <article>
    <div class="formulaire">
        <form class="add_cEMAC" action="domicile-model.php" method="post">
            <h4>Ajouter un CeMac</h4>
            <input class="champ" type="text" id="numero" name="numero" placeholder="numero CeMac" required>
            <select class="select-style" id="piece" name="piece" required>
                <?php
                while ($pie = $p->fetch()){
                    ?>
                    <option value="<?php echo $pie['ID']; ?>"> <?php echo $pie['nom']; ?> </option>
                    <?php
                }
                ?>
            </select>

            <br>

            <input class="boutton" name="addc" type="submit" value="Valider">

        </form>
    </div>
        <div class="formulaire">
        <form method="POST" action="domicile-model.php">
            <h4>Supprimer un CeMac</h4>
            <select class="select-style" id="piece" name="ID_cem" required>

                <?php

                while ($cem = $cemac2->fetch()){
                    ?>
                    <option value="<?php echo $cem['ID'] ; ?>"> <?php echo $cem['nom']; ?> </option>
                    <?php
                }
                ?>


                <input class="boutton" type="submit" name="delce" value="Supprimer" >

        </form>
    </div>
    </article>


    <article>
    <div class="formulaire">
        <form class="add_capt" method="post">
            <h4>Ajouter un capteur</h4>
            <input class="champ" type="text" id="nom" name="nom" placeholder="Nom equipement" required>
            <select class="select-style" id="piece" name="piece" required>
                <?php
                while ($donnees_piece = $reponse_piece->fetch()){
                    ?>
                    <option value="<?php echo  $donnees_piece['ID']; ?>"> <?php echo'piece: ', $donnees_piece['nom']; ?> </option>
                <?php
                }
                ?>
            </select>
            <select class="select-style" id="type_capteur" name="type_capteur" required>
                <?php
                while ($donnees_capteur = $reponse_capteur->fetch()){
                    ?>
                    <option value="<?php echo $donnees_capteur['ID']; ?>"> <?php echo'type: ', $donnees_capteur['nom_type']; ?> </option>
                <?php
                }
                ?>
            </select>
            <br>
            <input class="boutton" name="add" type="submit" value="Valider">

        </form>
    </div>
    <div class="formulaire">
        <form method="POST">
            <h4>Supprimer un capteur</h4>
            <select class="select-style" id="piece" name="ID_capt" required>
                <?php
                while ($cap = $capt->fetch()){
                    ?>
                    <option value="<?php echo $cap['ID'] ; ?>"> <?php echo $cap['nom']; ?> </option>
                    <?php
                }
                ?>
                <input class="boutton" type="submit" name="dell" value="Supprimer" >
        </form>
    </div>
    </article>
        <?php
        while ($equ_dom = $equipement_ajoutés->fetch()){
            ?><p style="/*box-shadow: 2px 2px 5px rgba(0, 0, 0, .1);*/">
            <?php echo $equ_dom['nom']; ?>
            <?php
        }
        ?>
</body>
