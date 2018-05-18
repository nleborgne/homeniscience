    <form class="ajouter_panne" action="index.php" method="post">
      <p>Équipement : </p>
      <?php $capteurs = getCapteurs();?>
      <select class="" name="ID_equipement">
        <?php
        while ($donnees = $capteurs->fetch()) {
          echo '<option value="'.$donnees['ID_equipement'].'">'.$donnees['nom_equipement'].'</option>';
        }
        ?>
      </select> <br>
      <p>Descriptif : </p>
      <input type="text" name="descriptif_panne" value=""> <br>
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
