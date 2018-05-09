<?php
session_start();
?>

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
</head>
<?php require ('header.php'); ?>
<body>
  <div class="container">
    <div class="flex2">
      <button class="accordion" type="button" name="button">Domicile</button>
      <div class="panel">
        <h3>Salon</h3>
        <i class="fas fa-lightbulb fa-2x"></i>
        <input type="range" name="" value="">
        <br>
        <br>
        <i class="fas fa-thermometer-three-quarters fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20°C
        <br><br>
        <i class="fas fa-volume-up fa-2x"></i>
        <input type="range" name="" value="">
        <h3>Chambre enfants</h3>
        <i class="fas fa-thermometer-three-quarters fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20°C
        <br><br>
        <i class="fas fa-volume-up fa-2x"></i>
        <input type="range" name="" value="">
      </div>
    </div>
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
        <p><strong>superman</strong> : je ne serai pas là cette aprem </p>
        <p><strong>batman</strong> : ne fermez pas la cave à clé svp </p>
        <p><strong>batman</strong> : ne fermez pas la cave à clé svp </p>
        <p><strong>batman</strong> : ne fermez pas la cave à clé svp </p>
        <p><strong>batman</strong> : ne fermez pas la cave à clé svp </p>
        <p><strong>batman</strong> : ne fermez pas la cave à clé svp </p>
        <p><strong>batman</strong> : ne fermez pas la cave à clé svp </p>
        <p><strong>batman</strong> : ne fermez pas la cave à clé svp </p>
        <p><strong>batman</strong> : ne fermez pas la cave à clé svp </p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="flex1">
      <button class="accordion" type="button" name="button">Sécurité</button>
      <div class="panel">
        <br><br>
        <label class="switch">
          <input type="checkbox">
          <span class="slider round"></span>
        </label>
        &nbsp;&nbsp;&nbsp;
        Alarme
      </div>
    </div>
    <div class="flex1">
      <button class="accordion" type="button" name="button">test</button>
      <div class="panel">
        <p>TEST FLEXBOX ACCORDION</p>
        <p>CONTENT GOES HERE</p>
      </div>
    </div>
    <div class="flex2">
      <button class="accordion" type="button" name="button">Statistiques</button>
      <div class="panel">
        <p>TEST FLEXBOX ACCORDION</p>
        <p>CONTENT GOES HERE</p>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }
  </script>
</body>
<?php require('../footer.php')?>
</html>
