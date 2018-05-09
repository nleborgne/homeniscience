<!DOCTYPE html>
<!-- trying to code a homepage for support section -->
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

  <link rel="stylesheet" href="/homeniscience/page/support/style.css">
</head>
<?php require('../header.php'); ?>
<body>
  <h1>SUPPORT</h1>
  <div class="container">
    <a href="panne/index/0">
      <button class="child">
        <i class="fas  fa-exclamation-triangle"></i>&nbsp;
        <p>Ajouter une panne</p>
      </button>
    </a>
    <a href="mailto:support@domisep.fr">
      <button class="child">
        <i class="fas fa-comment"></i>&nbsp;
        <p>Contacter Domisep</p>
      </button>
    </a>
  </div>
  <div class="container2">
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
          echo '<a href="/homeniscience/page/support/panne/index/'.$donnees['ID'].'#detail">';
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
</body>
</html>
