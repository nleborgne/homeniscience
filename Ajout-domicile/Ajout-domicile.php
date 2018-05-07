<!DOCTYPE html>
<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>ajout piece</title>
    <link rel="stylesheet" href="domicil.css">
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
    <form class="deff_domicile" method="post">

        <input type="text" id="name" name="nom" placeholder="nom ">
        <input type="text" id="adresse" name="rue" placeholder="Your adresse">
        <input type="text" id="num" name="num" placeholder="numero">
        <input type="text" id="cpost" name="post" placeholder="postal">
        <input type="text" id="pays" name="pays" placeholder="pays">
        <input type="text" id="superficie" name="size" placeholder="areasize ">

        <input class="boutton" type="submit" name="ajouter" value="definir">
        <?php

            if(isset($_POST['ajouter'])){
                if(!empty($_POST['nom']) AND !empty($_POST['rue']) AND !empty($_POST['num']) AND !empty($_POST['size'])) {
                    $requete = $bdd ->prepare('INSERT INTO domicile(ID,ID_utilisateur_principal,nom,nombre_pieces,superficie,ID_type_habitation,numero_habitation,rue,code_postal,pays,ID_confidentialitete)
                                VALUES (:ID,:ID_utilisateur_principal,:nom,:nombre_pieces,:superficie,:ID_type_habitation,:numero_habitation,:rue,:code_postal,:pays,:ID_confidentialite)');
                    $requete ->execute(array(
                        'ID' =>1,
                        'ID_utilisateur_principal' => 1,
                        'nom' => $_POST['nom'],
                        'nombre_pieces' => 0,
                        'superficie' =>$_POST['size'],
                        'ID_type_habitation' =>1,
                        'numero_habitation' =>$_POST['num'],
                        'rue' =>$_POST['rue'],
                        'code_postal' =>$_POST['post'],
                        'pays' =>$_POST['pays'],
                        'ID_confidentialite' =>1,
                    ));


                }
            }
        ?>
    </form>


    <br>
    <form class="add_room" method="post">
        <input type="text" id="piece" name="piece" placeholder="nom de la piece a ajouter ">

        <input class="boutton" type="submit" name="ajoutpiece" value="ajouter">
        <?php

         if(isset($_POST['ajoutpiece'])){
             if(!empty($_POST['piece'])) {

                 $requete = $bdd->prepare('INSERT INTO piece(ID,ID_domicile,nom,nombre_capteurs)
                 VALUES (:ID,:ID_domicile,:nom,:nombre_capteurs)');
                 $requete->execute(array(
                     'ID' => 10,
                     'ID_domicile' => 1,
                     'nom' => $_POST['piece'],
                     'nombre_capteurs' => 0,

                 ));
                
             }};  ?>
    </form>

    <form method="POST">
        <select class="selection" id="piece" name="nom_piece" required>

            <?php
            $piece = $bdd->query("SELECT nom FROM piece WHERE ID_domicile=1  ");
            while ($donnees_pieces = $piece->fetch()){
                ?>
                <option value="<?php echo $donnees_pieces['nom'] ; ?>"> <?php echo $donnees_pieces['nom']; ?> </option>
                <?php
            }
            ?>


            <input class="boutton" type="submit" name="Suprimer" value="Suprimer" >

            <?php
            if(isset($_POST['Suprimer'])) {
                $nom_piece= $_POST['nom_piece'];
                /*$sql = "UPDATE utilisateur SET ID_domicile=NULL ,ID=NULL ,nom=NULL ,nombre_capteurs=NULL, WHERE nom=:nom-piece";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array(
                    'nom-piece' => $nom_piece*/
                $req = $bdd->exec('DELETE FROM piece WHERE nom="'.$nom_piece.'" ' );
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
    <br>
    <br>
    <?php $piece_ajoutées = $bdd->query("SELECT nom FROM piece WHERE ID_domicile=1 ORDER BY ID");
    while ($piece_dom = $piece_ajoutées->fetch()){
        ?><br>
        <?php echo $piece_dom['nom']; ?>
        <?php
    }
    ?>


</div>
</body>