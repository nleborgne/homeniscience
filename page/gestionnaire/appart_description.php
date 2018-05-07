
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

<body>
	<header>
  		<?php require ('header_gestionnaire.php'); ?>
  	</header>
  	<?php 
  	require('gestionnaire_modele.php');
  	
	try {
    $domicile = AfficherDomicile();
    $piece = AfficherPiece();
    $user = AfficherUser();
    
    
}catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}

$donnees_domicile = $domicile->fetch();
$donnees_piece = $piece->fetch();
    
    ?>
    <div class="container_left">
    	<div class="flex2">
    		<?php echo '<button type="button" class="accordion" name="button">'.$donnees_domicile['nom'].'</button>';
            
            ?>
    		<div class="panel">
    			<?php echo '<p><strong>Adresse</strong> : '.$donnees_domicile['numero_habitation'].' '.$donnees_domicile['rue'].', '
      .$donnees_domicile['code_postal'].', '.$donnees_domicile['pays'].'.</p>'; 
    		    echo '<p><strong>Superficie</strong> : '.$donnees_domicile['superficie'].' m2</p>';
    		    echo '<p><strong>Nombre de pieces</strong> : '.$donnees_domicile['nombre_pieces'].'<p>';
      ?>
      			<h3>Listes des utilisateurs</h3>
      			<ul>
      				<?php 
      				while ($donnees_user = $user -> fetch()) {
      				    echo '<li>'.$donnees_user['prenom'].' '.$donnees_user['nom'].'</li>';
      				}
      				?>
      			</ul>
      			
    		</div>
    	</div>
    	
    	<div class=flex3>
    		<button type="button" class="accordion" name="button">Statistiques</button>
    		<div class="panel">
    			<img src="https://upload.wikimedia.org/wikipedia/commons/9/94/Histogramme_proche_loin.svg" alt="Histogramme consommation" />
    		</div>
    	</div>
    	
    	<p>Consommation : <br />
    	<input type="radio" name="conso" id="case1"  value="electricite" checked="checked" /><label for="case1">Electricite</label><br />
		<input type="radio" name="conso" id ="case2" value="eau" /><label for="case2">Eau</label><br />
    	<br />
    	Intervalle de temps : <br />
    	<input type="radio" name="temps" id="case3"  value="semaines" /><label for="case3">Semaines</label><br />
		<input type="radio" name="temps" id ="case4" value="mois" checked="checked" /><label for="case4">Mois</label>
    	</p>
    	
		
		
    </div>
    
    
	
</body>
</html>


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

    function updateTextInput(val) {
        document.getElementById('textInput').innerHTML = val; 
      }
    </script>
























