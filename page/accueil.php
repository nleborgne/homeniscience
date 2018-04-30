<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <p>TEST FLEXBOX ACCORDION</p>
        <p>CONTENT GOES HERE</p>
      </div>
    </div>
    <div class="flex1">
      <button class="accordion" type="button" name="button">Historique</button>
      <div class="panel">
        <p>TEST FLEXBOX ACCORDION</p>
        <p>CONTENT GOES HERE</p>
      </div>
    </div>
    <div class="flex1">
      <button class="accordion" type="button" name="button">Général</button>
      <div class="panel">
        <p>TEST FLEXBOX ACCORDION</p>
        <p>CONTENT GOES HERE</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="flex1">
      <button class="accordion" type="button" name="button">Alarme</button>
      <div class="panel">
        <p>TEST FLEXBOX ACCORDION</p>
        <p>CONTENT GOES HERE</p>
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
</html>
