<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/homeniscience/support/panne/support.css">
  <title>SUPPORT</title>
</head>


<?php require('../header2.php'); ?>

<br>
<body>
  <div class="filtrer">
    <p>Filtrer par : </p>

    <form class="" action="" method="post">
      <!-- filtrer -->
      <select name="filtre">
        <option value="panne_ID">ID</option>
        <option value="ID_utilisateur_principal">ID User</option>
        <option value="nom_utilisateur">Nom</option>
        <option value="date_panne">Date</option>
      </select>

      <!-- croissant / décroissant -->
      <select name="ordre">
        <option value="ASC">UP</option>
        <option value="DESC">DOWN</option>
      </select>
      <input type="submit" name="" value="Filtrer">
  </form>
</div>

  <div class="container">
    <div class="column">
      <a class="probleme">Liste des pannes</a>
      <article class="main">
        <?php
        while ($donnees = $reponse->fetch()) {
          echo '<div class="childPanne">';
          echo '<a href="/homeniscience/support/panne/index/'.$donnees['panne_ID'].'#detail">';
          echo '<ul>';
          echo '<li><strong> ID panne</strong> : '.$donnees['panne_ID'].'</li> ';
          echo '<li><strong> ID user</strong> : '.$donnees['ID_utilisateur_principal'].'</li> ';
          echo '<li><strong> Nom</strong> : '.$donnees['nom_utilisateur'].'</li> ';
          echo '<li><strong> Nom equipement</strong> : '.$donnees['nom_equipement'].'</li> ';
          echo '<li><strong> Date</strong> : '.$donnees['date_panne'].'</li> ';
          echo '<li><strong> Statut</strong> : <div class="statut">'.$donnees['nom_type'].'</div></li> ';
          echo '<li><strong> Descriptif</strong> : '.$donnees['descriptif_panne'].'</li> ';
          echo '</ul>';
          echo '</a>';
          echo '</div>';
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
        <form class="" action="/homeniscience/support/panne/form_edit_pannes.php" method="post">
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
          <br>
          <br>
        </form>
      </article>
    </div>
  </div>
  <script type="text/javascript">


  var a = document.getElementsByClassName('statut');
  for (var i = 0; i < a.length; i++) {
    if(a[i].innerHTML == "en attente") {
      a[i].className += " orange";
    }
    if(a[i].innerHTML == "terminé") {
      a[i].className += " green";
    }
  }
  </script>
</body>
</html>
