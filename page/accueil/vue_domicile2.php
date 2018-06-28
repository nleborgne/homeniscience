<table id="table" align="center">

    <?php if (strlen($domicile) < 2) { ?>
        <div class="container1" id="home">
            <div class="container1">
                <div class="flex1" style="margin-left: auto; margin-right: auto">
                    <form method="post" action="index.php">
                        <div class="panel" style="max-height: 500px; border: solid 1px #DDDDDD; text-align: center">
                            <img src="warning.png"
                                 style="height: 250px;width: 250px;margin-top: 20px; margin-left: 250px; margin-right: 250px; position: center">
                            <p style="padding-left: 100px;padding-right: 100px"> Ajoutez et configurez un domicile
                                ! </p>

                            <input class="boutton" type="submit" name="ajouterdomicile" value="mon domicile"
                                   style=" margin-left: 325px; margin-right: 325px; max-height: 40px; background-color: #ff9a00;  position: center">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (strlen($domicile) > 2) { ?>
        <?php
        while ($piece = $afficherPieces->fetch()) {
            echo '<tr>';
            echo '<td>';
            echo '<div class="child">';
            /* On affiche la pièce */
            echo '<h3 style="color: #696969; ">' . $piece['piece_nom'] . '</h3>';
            $afficherEffecteurs = getEffecteurs($piece['piece_ID']);
            $afficherEffecteurs2 = getEffecteurs2($piece['piece_ID']);

            echo "<div id='blockEffecteur'>";
            while ($effecteur = $afficherEffecteurs->fetch()) {
                switch ($effecteur['ID_type_equipement']) {
                    case 4:
                        echo "<div id='capteur' >";
                        echo '<i class="fas fa-thermometer fa-2x"></i>&nbsp &nbsp &nbsp;';
                        echo $ValTempArr[0], $ValTempArr[1] . "," . $ValTempArr[2], $ValTempArr[3] . "°C";
                        echo "</div>";
                        echo "<br>";
                        break;
                    case 3:
                        echo "<div id='capteur'>";
                        echo '<i class="fas fa-child fa-2x"></i>&nbsp &nbsp &nbsp;';
                        echo 'nobody detected';
                        echo "</div>";
                        echo "<br>";
                        break;
                    case 6:
                        echo "<div id='capteur'>";
                        echo "<i class='fas fa-ruler-horizontal fa-2x'> </i>&nbsp &nbsp &nbsp;";
                        echo $ValDist0['donnee'],'cm';
                        echo "</div>";
                        echo "<br>";
                        break;
                    case 7:
                        echo "<div id='capteur'>";
                        echo "<i class='fas fa-sun fa-2x'></i>&nbsp &nbsp &nbsp;";
                        echo (4095 - $ValLumi0['donnee'] )*15, 'lux';
                        echo "</div>";
                        echo "<br>";
                        break;

                }
            }
            echo "</div>";

            while ($actionneur = $afficherEffecteurs2->fetch()) {
                switch ($actionneur['ID_type_equipement']) {
                    case 2:
                        echo "<div id='actionneur'>";
                        echo '<i class="fas fa-lightbulb fa-2x"></i>';
                        echo '<input id="light" type="range" name="" value="">';
                        echo "</div>";
                        break;
                    case 5:
                        echo "<div id='actionneur'>";
                        echo "<img id='fan' src='https://d30y9cdsu7xlg0.cloudfront.net/png/172-200.png'> ";
                        echo "<label for='moteursliderallumer'></label>";
                        echo "<button id='moteursliderallumer' style='background-color: background-color:  #008CBA; border: none; color: white; padding: 7px 15px; text-align: center; display: inline-block; font-size: 16px; margin: 2px 1px; cursor: pointer;'>Allumer</button>";
                        echo "<label for='moteurslidereteint'></label>";
                        echo "<button id='moteurslidereteint'  style='background-color: background-color:  #008CBA; border: none; color: white; padding: 7px 15px; text-align: center; display: inline-block; font-size: 16px; margin: 2px 1px; cursor: pointer;' >Eteindre</button>";
                        echo "</div>";
                        break;

                }
            }
            echo '</div>';
        }
    } ?>
</table>
<script>
    // AJAX
    $("#moteursliderallumer").click(function () {

        //on allume le moteur
        $.ajax({
            url: 'http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009C&TRAME=1009C13021111',
            // La ressource ciblée
        });
    });

    $("#moteurslidereteint").click(function () {

        // on eteint le moteur
        $.ajax({
            url: 'http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009C&TRAME=1009C13020000',
        });
    });

    $("#light").click(function () {
        valueLight = document.getElementById("light").value * 30;
        //on allume la lampe
        $.ajax({
            url: 'http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009C&TRAME=1009C1305' + valueLight // La ressource ciblée
        });
    });


    function executeQuery() {
        $.ajax({
            url: '../../trames/trames_traitement.php',
            success: function (data) {
                $('#blockEffecteur').load(document.URL + " #blockEffecteur");
                // do something with the return value here if you like
            }
        });
        setTimeout(executeQuery, 1000); // you could choose not to continue on failure...
    }

    // run the first time; all subsequent calls will take care of themselves
     setTimeout(executeQuery, 1000);


</script>