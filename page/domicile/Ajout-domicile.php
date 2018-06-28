<!DOCTYPE html>
<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>ajout piece</title>
    <link rel="stylesheet" href="ajout.css">
</head>

<div>
<?php
require('../../connexion_bdd.php');
$recherche=' ';
$mail='';
?>
<br>
<div style="display:flex;flex-wrap: nowrap">
<img src="homeicone.png" style="height: 100px;width: 100px;">
<div style="display: inline-block">
<?php
$rue='';
$nom='';
$num='';
$pays='';
$cpost='';
$super='';
while ($dom = $domicile->fetch()){
    ?>
    <h3 style="box-shadow: 2px 2px 5px rgba(0, 0, 0, .1); font-size: 28px; border: 1px solid rgb(240,240,240)">
        <?php echo /*$dom['nom'],*/ ' ', $dom['numero_habitation'],' ', $dom['rue'],' ', $dom['code_postal']; ?></h3>
    <?php
     //if(strlen(  $dom['nom'] )>1){ echo $dom['rue'];}else{ echo 'numero de rue';}
    $rue=$dom['rue'];
    $nom=$dom['nom'];
    $num=$dom['numero_habitation'];
    $pays=$dom['pays'];
    $cpost=$dom['code_postal'];
    $super=$dom['superficie'];

}
?>
    <?php //if(strlen(  $dom['nom'] )>1){ echo $dom['rue'];}else{ echo 'numero de rue';}?>
</div>
</div>


    <article>
        <div class="formulaire">

            <form class="deff_domicile" method="post">
            <h4>&nbsp Editer le domicile</h4>
        <input type="text" id="name" name="nom" placeholder="Nom du domicile "  <?php if(strlen( $nom )>1){ echo 'value="',$nom,'"'; }?>" style="width: 280px;  margin: 5px " >
        <input type="text" id="adresse" name="rue" placeholder="Votre rue" <?php if(strlen( $nom )>1){ echo 'value="',$rue,'"';} ?>" style="width: 280px;  margin: 5px">
        <input type="text" id="num" name="num" placeholder="Numéro de rue" <?php if(strlen( $nom )>1){ echo 'value="',$num,'"';} ?>" style="width: 280px;  margin: 5px">
        <input type="text" id="cpost" name="post" placeholder="Code postal" <?php if(strlen( $nom )>1){ echo 'value="',$cpost,'"';} ?>" style="width: 280px;  margin: 5px">
        <input type="text" id="pays" name="pays" placeholder="Pays" <?php if(strlen( $nom )>1){ echo 'value="',$pays,'"';} ?>" style="width: 280px;  margin: 5px">
        <input type="text" id="superficie" name="size" placeholder="Superficie " <?php if(strlen( $nom )>1){ echo 'value="',$super,'"';} ?>" style="width: 280px;  margin: 5px" >
        <br>
                &nbsp  &nbsp &nbsp&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input class="boutton" type="submit" name="ajouter" value="Définir" >

    </form>
</div>
<div class="formulaire">

    <h4>Ajouter une pièce</h4>
    <form class="add_room" method="post">
        <input type="text" id="piece" name="piece" placeholder="Pièce à ajouter ">

        <input class="boutton" type="submit" name="ajoutpiece" value="Ajouter">

    </form>

    <form method="POST">
        <br>
        <h4>Supprimer une pièce</h4>
        <select class="select-style" id="piece" name="nom_piece" required>
            <option value="NULL"> Sélection de pièce </option>
            <?php

            while ($donnees_pieces = $piece->fetch()){
                ?>
                <option value="<?php echo $donnees_pieces['nom'] ; ?>"> <?php echo $donnees_pieces['nom']; ?> </option>
                <?php
            }
            ?>


            <input class="boutton" type="submit" name="accepter" value="Supprimer" >



    </form>
    <br>
    <?php
    while ($piece_dom = $piece_ajoutées->fetch()){
    ?><p style="/*box-shadow: 2px 2px 5px rgba(0, 0, 0, .1);*/">

        <?php  echo ' - '.  $piece_dom['nom']; ?>
        <?php
        }
        ?>

</div>
        </article>
    <br>

</div>
</html>
