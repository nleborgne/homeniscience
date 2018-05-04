<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="support.css">
  <title>SUPPORT</title>
</head>

<?php require('../header2.php'); ?>

<br>
<body>
  <div class="container">
    <div class="column">
      <article class="main">
        <a class="probleme">Liste des pannes</a>
        <ul class="liste">
          <li>ID panne</li>
          <li>ID user</li>
          <li>Nom user</li>
          <li>Type capteur</li>
          <li>Date panne</li>
          <li>Statut</li>
          <li>Détail</li>
        </ul>
        <?php
        while ($donnees = $reponse->fetch()) {
          echo '<a href="index.php?id='.$donnees['ID'].'#detail">';
          echo '<ul class="listepanne">';
          echo '<li>'.$donnees['ID'].'</li> ';
          echo '<li>'.$donnees['ID_utilisateur_principal'].'</li> ';
          echo '<li>'.$donnees['nom_utilisateur'].'</li> ';
          echo '<li>'.$donnees['nom_equipement'].'</li> ';
          echo '<li>'.$donnees['date_panne'].'</li> ';
          echo '<li>'.$donnees['nom_type'].'</li> ';
          echo '<li>'.$donnees['descriptif_panne'].'</li> ';
          echo '</ul>';
          echo '</a>';
        }
        ?>
      </article>
    </div>
  </div>

  <div class="container">
    <div class="column">
      <article id="detail">
        <a class="probleme" href="#">Détail panne</a>
        <ul class="listeDetail">
          <li>ID</li>
          <li>date panne</li>
          <li>date intervention</li>
          <li>statut panne</li>
          <li>descriptif</li>
        </ul>
        <form class="" action="form_edit_pannes.php" method="post">
          <?php
          while ($donnees = $details->fetch()) {
            echo '<ul class="listepanne"> ';
            echo '<input type="text" name="ID" value="'.$donnees['panne_ID'].'"> ';
            echo '<input type="date" name="date_panne" value="'.$donnees['date_panne'].'"> ';
            echo '<input type="date" name="date_intervention" value="'.$donnees['date_intervention'].'"> ';
            echo '<select name="ID_statut">';
            while ($donneesType = $detailsType->fetch()) {
              if($donneesType['ID'] == $donnees['ID_type_statut']) {
                echo'<option value="'.$donneesType['ID'].'" selected>'.$donneesType['nom_type'].'</option>';
              }else {
                echo'<option value="'.$donneesType['ID'].'">'.$donneesType['nom_type'].'</option>';
              }
            }
            echo '</select>';
            echo '<input type="text" name="descriptif" value="'.$donnees['descriptif_panne'].'"> ';
            echo '</ul> ';
          }
          ?>
          <input type="submit" name="" value="Enregistrer">
        </form>
      </article>
    </div>
  </div>
</body>
</html>
