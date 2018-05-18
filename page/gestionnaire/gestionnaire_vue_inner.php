
<div class="container">
  <?php
  $compteur = 0;
  while ($donnees = $domicile->fetch())
  {
    echo '<div class="flex1">';
    echo '<form method="GET" action="appart_description.php" enctype="multipart/form-data"><input type="button"
    name="'.$donnees['nom'].'" value="'.$donnees['nom'].'" class="accordion" title="Afficher le detail" OnClick="window.location.href=\'appart_description.php?id='.$donnees['ID'].'\'"></form>';
    echo '<div class="panel">';
    echo '<p><strong>Adresse</strong> : '.$donnees['numero_habitation'].' '. $donnees['rue'].'</p>';
    echo '<form method="GET" action="appart_description.php" enctype="multipart/form-data"><input type="button"
    name="Consulter la consommation" value="Consulter la consommation" class="consulter" title="Afficher le detail" OnClick="window.location.href=\'appart_description.php?id='.$donnees['ID'].'\'"></form>';
    
    echo '<h3>Liste des utilisateurs</h3>';
    
    ?>
    	<?php 
    	$domiciltest = $donnees['ID_domicile'];
    	echo $domiciltest;
    	$reponse_utilisateurs = $bdd->query("SELECT nom, prenom FROM utilisateur WHERE ID_domicile=$domiciltest");
        while ($utilisateurs = $reponse_utilisateurs->fetch()){
            ?>
            <p><?php echo $utilisateurs['prenom'].' &nbsp '. $utilisateurs['nom']; ?></p>




            <?php
        }
        ?>
     <?php 		
/* 
    echo '<h3 class="bareme">Bareme de consommation</h3>';
    echo '<label class="switch">
    <input type="checkbox">
    <span class="slider round"></span>
    </label>';
    ?>
    <input type="range" value="0" max="1000" min="0" step="50" onchange="updateTextInput(this.value);"></input>
    <p class="textInput">0</p>
    <?php
*/
    echo '</div>';
    echo '</div>';
    
  }
  ?>

</div>

<script type="text/javascript">



/*
function updateTextInput(val) {
  document.getElementsByClassName('textInput')[0].innerHTML = val;
}
*/

</script>
