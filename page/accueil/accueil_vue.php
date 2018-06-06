<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Accueil</title>
  <link rel="stylesheet" href="accueil.css">
</head
<?php require('../header.php'); ?>
<body>
  <h1 class="title">Bonjour <?php echo $name['prenom'].' '.$name['nom'];?></h1>

  <!-- Affichage dynamique des pièces et capteurs avec barre de recherche-->
  <div class="container">

    <div class="flex2">
      <button class="accordion" type="button" name="button">Domicile</button>
        <input class="search" id="search" name="search" placeholder="Rechercher..." type="text" autocomplete="off">

      <div class="panel">

        <?php include('vue_domicile.php'); ?>
      </div>
    </div>
  </div>

  <!-- Affichage statique de l'historique -->
  <div id="topContainer" class="container">
    <div class="flex1">
      <button class="accordion" type="button" name="button">Historique</button>
      <div class="panel">
        <p>30/04 16:05 : fenêtre cuisine ouverte</p>
        <p>30/04 17:05 : lumière chambre 2 allumée</p>
      </div>
    </div>

    <div class="flex1">
      <button class="accordion" type="button" name="button">Général</button>
      <div class="panel">
          <form action="index.php" method="post">
          <input type="text" id="superficie" name="msg_forum" placeholder="entrez un message"  style="width: 280px;  margin: 5px" >
         <input class="boutton" type="submit" name="ajouter" value="valider" >
          </form>

          <?php  while ($message=$messageforum->fetch()){
              ?>
              <p><?php echo '<strong>', $message['prenom'],'</strong>',' ','le ',$message['date'],':   ',$message['contenu'] ?> </p>
          <?php } ?>


      </div>
    </div>


      <div class="flex1">
      <button class="accordion" type="button" name="button">Sécurité</button>
      <div class="panel">
        <br><br>
        <label class="switch">
          <input type="checkbox">
          <span class="slider round"></span>
        </label>
        Alarme
      </div>
    </div>
    <div class="flex1">
      <button class="accordion" type="button" name="button">Infos</button>
      <div class="panel">
        <?php
        try {
          $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
        } catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
        }
        $get = $bdd->prepare('SELECT * from utilisateur WHERE ID = ?');
        $get->execute(array($_SESSION['ID']));
        $data = $get->fetch();
        echo 'Bonjour ' . $data['prenom'] . ' ' . $data['nom'];
        ?>
      </div>
    </div>
    <div class="flex1">
      <button class="accordion" type="button" name="button">Statistiques</button>
      <div class="panel">
        <img class="graph" src="graph.png" alt="">
      </div>
    </div>
  </div>
  <footer style="position: inherit">
      <?php require ('../footer.php')?>
  </footer>
  <script src="script.js"></script>

</body>

</html>
