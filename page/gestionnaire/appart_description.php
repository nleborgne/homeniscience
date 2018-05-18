
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width">
  <title>Accueil</title>
  <link rel="stylesheet" href="gestionnaire.css">
</head>

<body>
	<header>
  		<?php require ('../header.php'); ?>
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

//$donnees_domicile = $domicile->fetch();
//$donnees_piece = $piece->fetch();
   
$req = $bdd->prepare('SELECT * FROM domicile WHERE ID = ?');
$req->execute(array($_GET['id']));

$donnees_domicile = $req->fetch();
    ?>
    <div class="container_left">
    	<div class="flex2">
    		<?php echo '<form method="post" action="index.php" enctype="multipart/form-data"><input type="button"
      name="'.$donnees_domicile['nom'].'" value="'.$donnees_domicile['nom'].'" class="accordion" title="Retour" OnClick="window.location.href=\'index.php\'"></form>';
            ?>
    		<div class="panel">
    			<?php echo '<p><strong>Adresse</strong> : '.$donnees_domicile['numero_habitation'].' '.$donnees_domicile['rue'].', '
      .$donnees_domicile['code_postal'].', '.$donnees_domicile['pays'].'.</p>'; 
    		    echo '<p><strong>Superficie</strong> : '.$donnees_domicile['superficie'].' m2</p>';
    		    echo '<p><strong>Nombre de pieces</strong> : '.$donnees_domicile['nombre_pieces'].'<p>';
      ?>
      			<h3>Listes des utilisateurs</h3>
      			<ul title="Contacter" class="list_user">
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
    			<canvas id="myChart" width="400" height="250"></canvas>
    			<canvas id="myChart2" width="400" height="250"></canvas>
    		</div>
    	</div>
    	
    	<p class="checkside"><span class ="checktitle">Consommation</span> <br />
    	<input type="radio" name="conso" id="case1"  value="electricite" checked="checked" onclick="elec()"/><label for="case1">Electricite</label><br />
		<input type="radio" name="conso" id ="case2" value="eau" onclick="water()"/><label for="case2">Eau</label><br />
    	<br />
    	<span class="checktitle">Intervalle de temps</span> <br />
    	<input type="radio" name="temps" id="case3"  value="semaines" /><label for="case3">Semaines</label><br />
		<input type="radio" name="temps" id ="case4" value="mois" checked="checked" /><label for="case4">Mois</label>
    	</p>
    	
		
		
    </div>
    
	<?php require ('../footer.php')?>
	
</body>
</html>


	<script type="text/javascript">

	elec();
	
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


    
	function elec() {

	var ctx = document.getElementById("myChart").getContext('2d');
	document.getElementById("myChart2").style.height = '0';
	document.getElementById("myChart").style.height = 'auto';

	
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ["Mars", "Avril", "Mai", "Juin", "Juillet", "Aout"],
	        datasets: [{
	            label: 'Consommation d\'Electricite',
	            data: [30, 50, 45, 20, 2, 10],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                },
	                scaleLabel: {
		                display:true,
		                labelString: 'Consommation (kWh)'
	                }
                
	            }]
	          
	 		  
	        },
	        legend: {
		        labels: {
			        fontColor:'blue'
		        }
	        }
    }
   
	});
	}

	function water(){
		
		var crx = document.getElementById("myChart2").getContext('2d');
		document.getElementById("myChart").style.height = '0';
		document.getElementById("myChart2").style.height = 'auto';

		var myChart2 = new Chart(crx, {
		    type: 'bar',
		    data: {
		        labels: ["Mars", "Avril", "Mai", "Juin", "Juillet", "Aout"],
		        datasets: [{
		            label: 'Consommation d\'Eau',
		            data: [1500, 1200, 900, 1800, 2500, 2439],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255,99,132,1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                },
		                scaleLabel: {
			                display:true,
			                labelString: 'Litres'
		                }
	              
		            }]
		          
		 		  
		        },
		        legend: {
			        labels: {
				        fontColor:'blue'
			        }
		        }
	  }
		});

	}
	
    </script>
























