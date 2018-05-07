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
        $bdd = new PDO('mysql:host=localhost;dbname=site-domisep;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $id_dom_utilisateur = 1;
    ?>
    <br>
    <img src="sensorsicon.png" style="height: 80px;width: 80px;">
    <div class="formulaire">
        <form class="add_capt" method="post">
            <input class="champ" type="text" id="nom" name="nom" placeholder="Nom equipement" required>
            <select class="select-style" id="piece" name="piece" required>
                <?php $reponse_piece = $bdd->query("SELECT nom,ID FROM piece WHERE ID_domicile = $id_dom_utilisateur ORDER BY ID");
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

                             $requete = $bdd ->prepare('INSERT INTO equipement(ID,ID_piece,nom,ID_type_equipement,consommation)
                              VALUES (:ID,:ID_piece,:nom,:ID_type_equipement,:consommation)');
                             $requete ->execute(array(
                             'ID' =>1,
                             'ID_piece' => $_POST['piece'],
                             'nom' => $_POST['nom'],
                             'ID_type_equipement' => $_POST['type_capteur'],
                             'consommation' =>10,

                              ));
                         }
            }
            ?>
        </form>

        <form method="POST">
            <select class="select-style" id="piece" name="nom_capt" required>

                <?php
                $capt = $bdd->query("SELECT nom,consommation FROM equipement ORDER BY ID ");
                while ($cap = $capt->fetch()){
                    ?>
                    <option value="<?php echo $cap['nom'] ; ?>"> <?php echo $cap['nom']; ?> </option>
                    <?php
                }
                ?>


                <input class="boutton" type="submit" name="dell" value="Suprimer" >

                <?php
                if(isset($_POST['dell'])) {
                    $nom_cap= $_POST['nom_capt'];
                    $req = $bdd->exec('DELETE FROM equipement WHERE nom="'.$nom_cap.'" ' );
                    if ( !$req AND isset($_POST['Suprimer'])) {
                        echo 'Erreur de suppression';
                    } else {
                        echo 'Entrée supprimée';
                    }
                    //));

                }
                ?>

        </form>

        <?php

        $increment_nbr=$bdd->exec("UPDATE piece ");

        $equipement_ajoutes = $bdd->query("SELECT nom,consommation FROM equipement  ORDER BY ID");
        while ($equ_dom = $equipement_ajoutes->fetch()){
            ?><br>
            <?php echo $equ_dom['nom'],'  ',$equ_dom['consommation'];
        }
        ?>
    </div>
</body>