<table id="table" align="left">
  <?php
  while ($piece = $afficherPieces -> fetch() ) {
    echo '<tr>';
    echo '<td>';
    echo '<div class="child">';
    /* On affiche la pièce */
    echo '<h3>'.$piece['piece_nom'].'</h3>';
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
  //  echo '</td>';
    //echo '</tr>';
  }
  ?>
</table>
<?php
/* Tenter d'afficher les effecteurs d'une pièce
echo '<i class="fas fa-lightbulb fa-2x"></i>';
echo '<input type="range" name="" value="">';
echo '<br>';
echo '<br>';
echo '<i class="fas fa-thermometer-three-quarters fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20°C';
echo '<br><br>';
echo'<i class="fas fa-volume-up fa-2x"></i>';
echo '<input type="range" name="" value="">';*/

?>

<script type="text/javascript">
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
<style media="screen">
.child {
  margin-top:20px;
  width:320px;
  padding:1%;
  max-height:400px;
  box-shadow:2px 2px 10px rgba(0,0,0,0.2);
  margin-bottom:2%;
  margin-right:2%;
  border-radius:30px;
}
.child h3 {
  text-align:center;
}
.blockEffecteur {
  height:45px;
  }input[type=range] {
    -webkit-appearance: none;
    width: 90%;
    margin: 7.3px 0;
  }
  input[type=range]:focus {
    outline: none;
  }
  input[type=range]::-webkit-slider-runnable-track {
    width: 100%;
    height: 11.4px;
    cursor: pointer;
    box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
    background: rgba(0, 102, 235, 0.78);
    border-radius: 1.3px;
    border: 0.2px solid #010101;
  }
  input[type=range]::-webkit-slider-thumb {
    box-shadow: 0.9px 0.9px 1px #000031, 0px 0px 0.9px #00004b;
    border: 1.8px solid #00001e;
    height: 26px;
    width: 26px;
    border-radius: 15px;
    background: #ffffff;
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -7.5px;
  }
  input[type=range]:focus::-webkit-slider-runnable-track {
    background: rgba(5, 114, 255, 0.78);
  }
  input[type=range]::-moz-range-track {
    width: 100%;
    height: 11.4px;
    cursor: pointer;
    box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
    background: rgba(0, 102, 235, 0.78);
    border-radius: 1.3px;
    border: 0.2px solid #010101;
  }
  input[type=range]::-moz-range-thumb {
    box-shadow: 0.9px 0.9px 1px #000031, 0px 0px 0.9px #00004b;
    border: 1.8px solid #00001e;
    height: 26px;
    width: 26px;
    border-radius: 15px;
    background: #ffffff;
    cursor: pointer;
  }
  input[type=range]::-ms-track {
    width: 100%;
    height: 11.4px;
    cursor: pointer;
    background: transparent;
    border-color: transparent;
    color: transparent;
  }
  input[type=range]::-ms-fill-lower {
    background: rgba(0, 91, 210, 0.78);
    border: 0.2px solid #010101;
    border-radius: 2.6px;
    box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  }
  input[type=range]::-ms-fill-upper {
    background: rgba(0, 102, 235, 0.78);
    border: 0.2px solid #010101;
    border-radius: 2.6px;
    box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  }
  input[type=range]::-ms-thumb {
    box-shadow: 0.9px 0.9px 1px #000031, 0px 0px 0.9px #00004b;
    border: 1.8px solid #00001e;
    height: 26px;
    width: 26px;
    border-radius: 15px;
    background: #ffffff;
    cursor: pointer;
    height: 11.4px;
  }
  input[type=range]:focus::-ms-fill-lower {
    background: rgba(0, 102, 235, 0.78);
  }
  input[type=range]:focus::-ms-fill-upper {
    background: rgba(5, 114, 255, 0.78);
  }


</style>
