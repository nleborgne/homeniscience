<!DOCTYPE html>
<?php
//Step1
$db = mysqli_connect('localhost','root','','homeniscience')
or die('Error connecting to MySQL server.');
?>

<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="domicile.css">
    <title>MON DOMICILE</title>



</head>
<?php require('header.php'); ?>
<body>
<div class="container">
    <div class="column">
        <article>
            <a class="domicile">Domicile</a>
            <div class="container">
                <div class="column">
                    image domicile a placer ici elle ne doit pas etre ni trop grande ni trop petite, a px pres cette taille
                </div>
                <div class="column">
                    <form action="domicile.php" style="margin:auto;max-width:200px" method="post">

                        <input type="text" id="adresse" name="rue" placeholder="Your adresse">
                        <input type="text" id="adresse" name="numero" placeholder="numero">
                        <input type="text" id="adresse" name="postal" placeholder="postal">
                        <input type="text" id="adresse" name="contry" placeholder="country">
                        <input type="text" id="superficie" name="superficie" placeholder="areasize ">

                        <button type="submit" value="Validate" name="validate1"><i class="fa fa-search"></i></button>

                        <?php
                        {
                            if(isset($_POST['Validate2'])) {


                                $sql = "INSERT INTO domicile (ID,ID_utilisateur_principal,nom	nombre_pieces,superficie,ID_type_habitation,numero_habitation	,rue,code_postal,pays,ID_confidentialite)
                                VALUES (,,'" . $_POST['numero'] . "','" . $_POST['rue'] . "','" . $_POST['postal'] . "','" . $_POST['country'] . "',,,,)";

                                if ($conn->query($sql) === TRUE) {
                                    echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;

                                }

                                $query = " SELECT ID nom FROM domicile WHERE rue='" . $_POST['rue'] . "' AND pnumero_habitationostal='" . $_POST['numero'] . "'";
                                $Id_domicile=mysqli_query($db,$query);


                                $sql = "UPDATE utilisateur SET Id_domicile=$Id_domicile WHERE ID= '".$_POST['Id']."' ";

                                if ($conn->query($sql) === TRUE) {
                                    echo "Record updated successfully";
                                } else {
                                    echo "Error updating record: " . $conn->error;
                                }

                            }
                        }

                        ?>

                    </form>
                </div>
            </div>
            <?php
            $house = array();
            if (isset($_POST['adresse'])) {
                array_push($house, $_POST['adresse'], $_POST['superficie']);
            }

            ?>
            <div class="container">

                <form class="ajout" action="domicile.php" style="margin:auto;max-width:200px" method="post">
                    <input type="text" placeholder="add...room" name="piece">
                    <button type="submit" value="Valider" name="validate2"><i class="fa fa-search"></i></button>
                    <?php
                    {
                        if(isset($_POST['Validate2'])) {


                            $sql = "INSERT INTO piece(ID,ID_domicile,nom,nombre_capteurs)
                            VALUES (,,'" . $_POST['piece'] . "',)";

                            if ($conn->query($sql) === TRUE) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }

                    ?>
                </form>




            </div>
            <div class="container">
                <?php


                $Id_domicile="lol";
                $query = "SELECT nom FROM domicile /*WHERE Id_domicile= */$Id_domicile";
                mysqli_query($db, $query) or die('fail');


                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);

                while ($row = mysqli_fetch_array($result)) {
                    echo $row['first_name'] . ' ' . $row['last_name'] . ': ' . $row['email'] . ' ' . $row['city'] .'<br />';
                }

                mysqli_close($db);
                ?>



            </div>
        </article>

    </div>
    <div class="column">
        <article>
            <a class="ceMac">ceMac</a>

            <form action="domicile.php" method="post">
                <? while (machinbrol)
                {
                    ?>
                    <input type="text" name="<? echo $num_caract_user; ?>" />
                    <?
                    $cemac = array();

                    if (isset($_POST[$num_caract_user])){
                        array_push( $pseudo,$_POST[$num_caract_user]);
                    }


                }
                ?>
                <input type="submit" value="Valider" class="submit"/>

            </form>


        </article>



    </div>


    <div class="column">
        <aside>
            <a class="utilisateur">utilisateur</a>

            <a>ajouter un utilisateur:</a>

            <form action="" method="GET" >
                Enter an Id: <input type="number" name= "Id" />
                <input type="submit" name= "Emp" value="Check" />
            </form>





            <form class="ajout" action="domicile.php" method="POST" style="margin:auto;max-width:200px">
                <input type="text" placeholder="Search..users Id" name="Id">
                <button type="submit"><i class="fa fa-search"></i></button>
                <?php
                if(isset($_POST['Id']))
                {


                    $sql = "UPDATE utilisateur SET Id_domicile='Id_domicile' WHERE ID= '".$_POST['Id']."' ";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }




                }


                $pseudo = array();


                ?>

                <p> <?php  /* $pseudo[0] */ ?></p>
            </form>

            <div class="container">
                <?php
                /*$query = "SELECT  prenom  FROM utilisateur ";
                mysqli_query($db, $query) or die('Error querying database.');


                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);

                while ($row = mysqli_fetch_array($result)) {
                    echo $row['nom'] . ' ' . $row['prenom'] . '<br />';
                }

                mysqli_close($db);*/
                ?>
            </div>
        </aside>
        <aside>
            <div class="container">
                <?php                              ?>
                <input type="checkbox" /> <?php           echo array_pop($pseudo)                   ?><br />
                <input type="checkbox" /> <?php           echo array_pop($pseudo)                   ?> <br />
                <input type="checkbox" /> Batgirl <br />
                <input type="checkbox" /> Alfred <br />

            </div>
        </aside>

    </div>

</div>
</body>

<footer>
    <a href="support">support</a>
    <a href="legale">mention legale</a>
    <a href="use">terme d'utilisation</a>
    <a href="about">a propos</a>
</footer>
</html>
