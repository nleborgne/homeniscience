<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Accueil</title>
  <link rel="stylesheet" href="gestionnaire.css">
</head>
<?php require ('header_gestionnaire.php'); ?>
<body>
  <div class="container">
    <div class="flex2">
      <button class="accordion" type="button" name="button">Bareme de Consommation</button>
      <div class="panel">
      
      </div>
    </div>
  
  </div>
  <div class="container">
    <div class="flex1">
      	<button class="accordion" type="button" name="button">Appartement XXX</button>
      	<div class="panel">
      	
      	</div>
    </div>
    <div class="flex1">
      <button class="accordion" type="button" name="button">Appartement XXX</button>
      <div class="panel">
      
      </div>
    </div>
      <div class="flex1">
      	<button class="accordion" type="button" name="button">Appartement XXX</button>
    	<div class="panel">
        
        </div>
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
