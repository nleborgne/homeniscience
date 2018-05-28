<form class="ajouter_panne" action="index.php" method="post" id="ajouterPanne">
  <p>Équipement : </p>
  <?php $capteurs = getCapteurs();?>
  <select class="" name="ID_equipement">
    <?php
    while ($donnees = $capteurs->fetch()) {
      echo '<option value="'.$donnees['ID_equipement'].'">'.$donnees['nom_equipement'].' ('.$donnees['nom_piece'].')</option>';
    }
    ?>
  </select>
  <p>Descriptif : </p>
  <textarea name="descriptif_panne" rows="7" cols="30" form="ajouterPanne"></textarea>
  <div style="text-align:center;">
    <input type="submit" name="" value="Valider">
  </div>
</form>

<style media="screen">
p,input {
  font-family: 'Lato', 'sans-serif';
  display:inline-block;
}
input[type=submit] {
  margin : 0 auto;
  border-radius : 5px;
  background-color: #0099ff;
  color:white;
  padding:10px;
  font-size:12px;
  border:none;
  cursor:pointer;
}
input[type=submit]:hover {
  background-color: #4353E2;
}
</style>
