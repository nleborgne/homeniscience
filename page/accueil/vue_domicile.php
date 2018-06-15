<!-- passer en mvc -->
<table id="table" align="left">

    <?php
    while ($piece = $afficherPieces->fetch()) {
        echo '<tr>';
        echo '<td>';
        echo '<div class="child">';
        /* On affiche la pièce */
        echo '<h3>' . $piece['piece_nom'] . '</h3>';
        $afficherEffecteurs = getEffecteurs($piece['piece_ID']);
        while ($effecteur = $afficherEffecteurs->fetch()) {
            echo "<div class='blockEffecteur'>";
            echo $effecteur["ID_type_equipement"];
            switch ($effecteur['ID_type_equipement']) {
                case 1:
                    echo '<i class="fas fa-tint fa-2x"></i>&nbsp;';
                    echo '20%';
                    break;
                case 2:
                    echo '<i class="fas fa-lightbulb fa-2x"></i>';
                    echo '<input type="range" name="" value="">';
                    break;
                case 3:
                    echo '<i class="fas fa-child fa-2x"></i>&nbsp;';
                    echo 'nobody detected';
                    break;
                case 4:
                    echo " <label class='switch'>
   			   		<input type='checkbox'>
    				<span class='slider round'></span>
    			</label>";
                    break;
                case 5:
                    echo " <label class='switch'>
   			   		<input type='checkbox'>
    				<span class='slider round'></span>
    			</label>";
                    break;
            }
            echo '</div>';
        }
        echo '</div>';
    }
    ?>
</table>

<script>alert('temp');</script>
