<!-- passer en mvc -->
<table id="table" align="center">

<?php  if(strlen($domicile)<2){ ?>
    <div class="container1" id="home" >
        <div class="container1">
            <div class="flex1" style="margin-left: auto; margin-right: auto">
                <form method="post" action="index.php">

                    <div class="panel" style="max-height: 500px; border: solid 1px #DDDDDD; text-align: center">
                        <img src="warning.png" style="height: 250px;width: 250px;margin-top: 20px; margin-left: 250px; margin-right: 250px; position: center">
                        <P style="padding-left: 100px;padding-right: 100px"> Ajoutez et configurez un domicile ! </P>

                        <input class="boutton" type="submit" name="ajouterdomicile" value="mon domicile" style=" margin-left: 325px; margin-right: 325px; max-height: 40px; background-color: #ff9a00;  position: center">

                    </div>
                </form>
                </div>
            </div>
        </div>
    <?php  } ?>

    <?php  if(strlen($domicile)>2){ ?>
        <?php
        while ($piece = $afficherPieces -> fetch() ) {
            echo '<tr>';
            echo '<td>';
            echo '<div class="child">';
            /* On affiche la pièce */
            echo '<h3 style="color: #696969; ">'.$piece['piece_nom'].'</h3>';
            $afficherEffecteurs = getEffecteurs($piece['piece_ID']);
            while($effecteur = $afficherEffecteurs->fetch()) {
                echo "<div class='blockEffecteur'>";
                switch ($effecteur['ID_type_equipement']) {
                    case 1:
                        echo '<i class="fas fa-tint fa-2x"></i>&nbsp;';
                        echo '10%';
                        break;
                    case 2:
                        echo '<i class="fas fa-lightbulb fa-2x"></i>';
                        echo '<input type="range" name="" value="">';
                        break;
                    case 3:
                        echo '<i class="fas fa-child fa-2x"></i>&nbsp;';
                        echo 'nobody detected';
                        break;
                }
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    <?php  } ?>


</table>
