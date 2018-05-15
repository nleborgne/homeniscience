<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
  integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Accueil</title>
  <link rel="stylesheet" href="accueil.css">
</head>
<?php require('../header.php'); ?>
<body>
  <div class="container">
    <div class="flex2">
      <button class="accordion" type="button" name="button">Domicile</button>
      <div class="panel">
        <?php include('vue_domicile.php'); ?>
      </div>
    </div>
  </div>
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
        <p><strong>maman</strong> : je ne serai pas là cette aprem </p>
        <p><strong>john</strong> : ne fermez pas la cave à clé svp </p>
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

  <script type="text/javascript">
      /*
  var acc = document.getElementsByClassName("accordion");
  //var cont = document.getElementById("topContainer");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        //cont.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        //  cont.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }*/
</script>
</body>
<?php require('../footer.php') ?>
</html>
