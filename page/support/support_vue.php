<!DOCTYPE html>
<!-- trying to code a homepage for support section -->
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Support</title>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <link rel="stylesheet" href="/homeniscience/page/support/style.css">
</head>
<body>
  <?php require('../header.php'); ?>
  <h1>Support</h1>
  <div class="container">
    <a href="">
      <button class="child">
        <i class="far fa-question-circle"></i>&nbsp;
        <p>Foire aux questions</p>
      </button>
    </a>
    <a href="mailto:support@domisep.fr">
      <button class="child">
        <i class="fas fa-comment"></i>&nbsp;
        <p>Contacter Domisep</p>
      </button>
    </a>
  </div>
  <div class="container">

  <div class="container2">
    <div class="column">
      <article class="main">
        <a class="probleme">Mes pannes</a>
        <ul class="liste">
          <li>Type capteur</li>
          <li>Date panne</li>
          <li>Statut</li>
          <li>Détail</li>
        </ul>

        <?php
        while ($donnees = $reponse->fetch()) {
          echo '<ul class="listepanne">';
          echo '<li>'.$donnees['nom_equipement'].'</li> ';
          echo '<li>'.$donnees['date_panne'].'</li> ';
          echo '<li>'.$donnees['nom_type'].'</li> ';
          echo '<li>'.$donnees['descriptif_panne'].'</li> ';
          echo '</ul>';
        }
        ?>
      </article>
    </div>
  </div>

  <div id="ajout_panne" class="container2">
    <div class="column">
      <article class="main">
        <a class="probleme">Ajouter une panne</a>
        <?php require('ajout_capteur.php');?>
      </article>
    </div>
  </div>

</div>
  <?php include('../footer.php'); ?>
</body>
</html>
