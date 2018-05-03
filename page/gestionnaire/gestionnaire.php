<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width">
  <title>Accueil</title>
  <link rel="stylesheet" href="gestionnaire.css">
</head>
<?php require ('header_gestionnaire.php'); ?>
<body>
  
  
  </div>
  <div class="container">
      	<?php 
      	while ($donnees = $reponse->fetch())
        {
            echo '<div class="flex1">';
            echo '<button class="accordion" type="button" name="button">'.$donnees['nom'].'</button>';
            echo '<div class="panel">';
            echo '<p><strong>Adresse</strong> : '.$donnees['numero_habitation'].' '. $donnees['rue'].'</p>';
            echo '<h3>Consulter la consommation</h3>';
            ?>
            <p> Consommation d'eau : value</p>
			<p id="afficher">Afficher le graphe</p>
            <div id="sample">
            <img src="https://cdn.kastatic.org/ka-perseus-graphie/9637eaefb1a58a2ef2fb26f24f5bae9c8f1d25a9.svg" class="graphe"/>
            </div>
            
            <p> Consommation d'electricit&eacute : value</p>
            <p id="afficher2">Afficher le graphe</p>
            <div id="sample2">
            <img src="https://cdn.kastatic.org/ka-perseus-graphie/9637eaefb1a58a2ef2fb26f24f5bae9c8f1d25a9.svg" class="graphe"/>
            </div>
            <?php
            echo '<h3>Bareme de consommation</h3>';
            
             
            echo '</div>';
            echo '</div>';
        }
        ?>

   </div>
      
  <script type="text/javascript">
  
  var c = document.getElementById("sample2");
  var d = document.getElementById("afficher2");
   document.getElementById("afficher2").onclick = function() {
 	  	if(c.style.height != '200px') {
 		  	d.innerHTML = "Cacher le graphe";
 	    c.style.height = '200px';
 	  	}else {
 		  	d.innerHTML = "Afficher le graphe";
 		  	c.style.height='0';
 	}
   }
  
 var a = document.getElementById("sample");
 var b = document.getElementById("afficher");
  document.getElementById("afficher").onclick = function() {
	  	if(a.style.height != '200px') {
		  	b.innerHTML = "Cacher le graphe";
	    a.style.height = '200px';
	  	}else {
		  	b.innerHTML = "Afficher le graphe";
		  	a.style.height='0';
	}
  }

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
