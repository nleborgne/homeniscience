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
<div style="display:flex;flex-wrap: nowrap">
<img src="homeicone.png" style="height: 100px;width: 100px;">
<div style="display: inline-block">
<?php $domicile = $bdd->query("SELECT nom,numero_habitation,rue,code_postal,superficie FROM domicile WHERE ID= $ID_domicile ORDER BY ID");
while ($dom = $domicile->fetch()){
    ?><br>
    <h3 style="box-shadow: 2px 2px 5px rgba(0, 0, 0, .1);">
        <?php echo $dom['nom'], ' ', $dom['numero_habitation'],' ', $dom['rue'],' ', $dom['code_postal']; ?></h3>
    <?php
}
?>

    <form method="post">

    <input class="boutton" type="submit" name="new" value="Supprimer" >

    <?php
    if(isset($_POST['new'])) {

        $req = $bdd->exec('DELETE FROM domicile WHERE ID="'.$ID_domicile.'" ' );
        if ( !$req ) {
            echo 'Erreur de suppression';
        } else {
            echo 'Entrée supprimée';
        }
        //));

    }
    ?>

    </form>
</div>
</div>


    <article>
        <div class="formulaire">

            <form class="deff_domicile" method="post">
            <h4>ajouter un domicile</h4>
        <input type="text" id="name" name="nom" placeholder="nom ">
        <input type="text" id="adresse" name="rue" placeholder="Your adresse">
        <input type="text" id="num" name="num" placeholder="numero">
        <input type="text" id="cpost" name="post" placeholder="postal">
        <input type="text" id="pays" name="pays" placeholder="pays">
        <input type="text" id="superficie" name="size" placeholder="areasize ">
        <br>
        <input class="boutton" type="submit" name="ajouter" value="definir" >
        <?php

            if(isset($_POST['ajouter'])){
                if(!empty($_POST['nom']) AND !empty($_POST['rue']) AND !empty($_POST['num']) AND !empty($_POST['size']) ) {

                    $requete = $bdd ->prepare('INSERT INTO domicile(ID,ID_utilisateur_principal,nom,nombre_pieces,superficie,ID_type_habitation,numero_habitation,rue,code_postal,pays,ID_confidentialite,ID_gestionnaire)
                                VALUES (:ID,:ID_utilisateur_principal,:nom,:nombre_pieces,:superficie,:ID_type_habitation,:numero_habitation,:rue,:code_postal,:pays,:ID_confidentialite,:ID_gestionnaire)');
                    $requete ->execute(array(
                        'ID' =>NULL,
                        'ID_utilisateur_principal' => $ID_utilisateur_principal,
                        'nom' => $_POST['nom'],
                        'nombre_pieces' => 0,
                        'superficie' =>$_POST['size'],
                        'ID_type_habitation' =>1,
                        'numero_habitation' =>$_POST['num'],
                        'rue' =>$_POST['rue'],
                        'code_postal' =>$_POST['post'],
                        'pays' =>$_POST['pays'],
                        'ID_confidentialite' =>1,
                        'ID_gestionnaire'=>0,
                    ));


                }
                else{
                    echo"ajout impossible";
                }
            }

        ?>
    </form>
</div>
<div class="formulaire">

    <h4>ajouter une piece</h4>
    <form class="add_room" method="post">
        <input type="text" id="piece" name="piece" placeholder="nom de la piece a ajouter ">

        <input class="boutton" type="submit" name="ajoutpiece" value="ajouter">
        <?php

         if(isset($_POST['ajoutpiece'])){
             if(!empty($_POST['piece'])) {

                 $requete = $bdd->prepare('INSERT INTO piece(ID,ID_domicile,nom,nombre_capteurs)
                 VALUES (:ID,:ID_domicile,:nom,:nombre_capteurs)');
                 $requete->execute(array(
                     'ID' => NULL,
                     'ID_domicile' => $ID_domicile,
                     'nom' => $_POST['piece'],
                     'nombre_capteurs' => 0,

                 ));

             }};  ?>
    </form>

    <form method="POST">
        <br>
        <h4>supprimer une piece</h4>
        <select class="select-style" id="piece" name="nom_piece" required>

            <?php
            $piece = $bdd->query("SELECT nom FROM piece WHERE ID_domicile=$ID_domicile  ");
            while ($donnees_pieces = $piece->fetch()){
                ?>
                <option value="<?php echo $donnees_pieces['nom'] ; ?>"> <?php echo $donnees_pieces['nom']; ?> </option>
                <?php
            }
            ?>


            <input class="boutton" type="submit" name="Suprimer" value="Supprimer" >

            <?php
            if(isset($_POST['Suprimer'])) {
                $nom_piece= $_POST['nom_piece'];
                /*$sql = "UPDATE utilisateur SET ID_domicile=NULL ,ID=NULL ,nom=NULL ,nombre_capteurs=NULL, WHERE nom=:nom-piece";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array(
                    'nom-piece' => $nom_piece*/
                $req = $bdd->exec('DELETE FROM piece WHERE nom="'.$nom_piece.'"AND  ID_domicile="'.$ID_domicile.'"  ' );
                if ( !$req AND isset($_POST['Suprimer'])) {
                    echo 'Erreur de suppression';
                } else {
                    echo 'Entrée '.$nom_piece.' supprimée';
                }
                //));

            }
            ?>

    </form>

</div>
        </article>
    <br>

    <?php $piece_ajoutées = $bdd->query("SELECT nom FROM piece WHERE ID_domicile=$ID_domicile ORDER BY ID");
    while ($piece_dom = $piece_ajoutées->fetch()){
        ?><p style="box-shadow: 2px 2px 5px rgba(0, 0, 0, .1);">

        <?php  echo  $piece_dom['nom']; ?>
        <?php
    }
    ?>


</div>
</html>
