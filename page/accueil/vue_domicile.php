<?php
while ($piece = $afficherPieces -> fetch() ) {
  echo '<div class="child">';
  echo '<h3>'.$piece['piece_nom'].'</h3>';
  echo '<i class="fas fa-lightbulb fa-2x"></i>';
  echo '<input type="range" name="" value="">';
  echo '<br>';
  echo '<br>';
  echo '<i class="fas fa-thermometer-three-quarters fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20°C';
  echo '<br><br>';
  echo'<i class="fas fa-volume-up fa-2x"></i>';
  echo '<input type="range" name="" value="">';
  echo '</div>';
}
?>

<style media="screen">
.child {
  width:300px;
  padding:1%;
  margin : auto;
  box-shadow:2px 2px 10px rgba(0,0,0,0.2);
  margin-bottom:2%;

}
  .child h3 {
    text-align:center;
  }
</style>
