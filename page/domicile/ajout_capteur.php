<!DOCTYPE html>
<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Validation inscription</title>
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
    <br>
    <img src="sensorsicon.png" style="height: 80px;width: 80px;">
    <br>
    <div class="formulaire">
        <form class="add_capt" method="post">
            <input class="champ" type="text" id="nom" name="nom" placeholder="Nom equipement" required>
            <select class="select-style" id="piece" name="piece" required>
                <?php $reponse_piece = $bdd->query("SELECT nom,ID FROM piece WHERE ID_domicile = $ID_domicile ORDER BY ID");
                while ($donnees_piece = $reponse_piece->fetch()){
                    ?>
                    <option value="<?php echo $donnees_piece['ID']; ?>"> <?php echo $donnees_piece['nom']; ?> </option>
                <?php
                }
                ?>
            </select>
            <select class="select-style" id="type_capteur" name="type_capteur" required>
                <?php $reponse_capteur = $bdd->query("SELECT nom_type,ID FROM type_equipement ORDER BY ID");
                while ($donnees_capteur = $reponse_capteur->fetch()){
                    ?>
                    <option value="<?php echo $donnees_capteur['ID']; ?>"> <?php echo $donnees_capteur['nom_type']; ?> </option>
                <?php
                }
                ?>
            </select>
            <input class="boutton" name="add" type="submit" value="Valider">
            <?php

            if(isset($_POST['add'])){
                   if(!empty($_POST['nom'])) {

                             $requete = $bdd ->prepare('INSERT INTO equipement( ID ,ID_piece ,nom, ID_type_equipement )
                              VALUES ( :ID , :ID_piece , :nom , :ID_type_equipement )');
                             $requete ->execute(array(
                             'ID' =>NULL,
                             'ID_piece' => $_POST['piece'],
                             'nom' => $_POST['nom'],
                             'ID_type_equipement' => $_POST['type_capteur'],


                              ));
                         }
            }
            ?>
        </form>

        <form method="POST">
            <select class="select-style" id="piece" name="ID_capt" required>

                <?php
                $capt = $bdd->query("SELECT equipement.nom,equipement.ID FROM equipement JOIN piece ON equipement.ID_piece = piece.ID WHERE piece.ID_domicile= $ID_domicile ");
                while ($cap = $capt->fetch()){
                    ?>
                    <option value="<?php echo $cap['ID'] ; ?>"> <?php echo $cap['nom']; ?> </option>
                    <?php
                }
                ?>


                <input class="boutton" type="submit" name="dell" value="Supprimer" >

                <?php

                if(isset($_POST['dell'])) {

                    $ID_cap= $_POST['ID_capt'];
                    $req = $bdd->exec('DELETE FROM equipement WHERE ID="'.$ID_cap.'"  ' );
                    if ( !$req AND isset($_POST['Suprimer'])) {
                        echo 'Erreur de suppression';
                    } else {
                        echo 'Entrée supprimée';
                    }
                    //));

                }
                ?>

        </form>


        <?php $equipement_ajoutés = $bdd->query("SELECT equipement.nom FROM equipement JOIN piece ON equipement.ID_piece = piece.ID WHERE piece.ID_domicile=$ID_domicile  ");
        while ($equ_dom = $equipement_ajoutés->fetch()){
            ?><p style="box-shadow: 2px 2px 5px rgba(0, 0, 0, .1);">
            <?php echo $equ_dom['nom']; ?>
            <?php
        }
        ?>
    </div>
</body>