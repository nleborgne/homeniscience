
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
  <link rel="stylesheet" href="../css/gestionnaire.css">
</head>

<body>
	<header>
  		<?php require ('../../header.php'); ?>
  	</header>
  	<?php require('../modele/gestionnaire_modele.php'); ?>
  	
    <div class="container">
    	<div class="flex2">
    		<form method="post" action="index.php" enctype="multipart/form-data"><input type="button"
      name="appart" value="<?php echo $donnees_domicile['nom'] ?>" class="accordion" title="Retour" OnClick="window.location.href='../controller/index.php'"></form>
            
    		<div class="panel4">
    	    	<p><strong>Adresse</strong> : <?php echo $donnees_domicile['numero_habitation'].' '.$donnees_domicile['rue']; ?>
      <?php echo $donnees_domicile['code_postal'].' '.$donnees_domicile['pays'] ?></p>
    		    <p><strong>Superficie</strong> : <?php echo $donnees_domicile['superficie'] ?> m2</p>
    		    <p><strong>Nombre de pieces</strong> : <?php echo $donnees_domicile['nombre_pieces'] ?><p>
      
      			<h3>Listes des utilisateurs</h3>
      			<ul class="list_user">
      				<?php 
      				while ($donnees_user = $user -> fetch()) {
      				    ?>
      				    <li>
          				    <form method="post" action="../controller/appart_controller.php?id=<?php echo $_GET['id']?>" enctype="multipart/form-data" class="user_form">
          				    <span class="list" title="Contacter"><?php echo $donnees_user['prenom'].' '.$donnees_user['nom']; ?></span>
          				  	  <input type="hidden" name="<?php echo $donnees_user['ID']; ?>" value="<?php echo $donnees_user['ID_domicile']; ?>" />
          				   	  <input type="submit" class="user_input" value="Supprimer" />
          				   	</form>
      				   	</li>
      				<?php 
      				}
      				?>
      			</ul>
      			<h3>Ajouter un utilisateur</h3>
      			
      			<form method="post" action="../controller/appart_controller.php?id=<?php echo $_GET['id']?>" enctype="multipart/form-data" class="user_form">
				
					<p class="formulaire">
						<label for="email">Adresse e-mail :</label>
					</p>

        			<input type="email" id="email" name="email" placeholder="Email"
        				size="20" /> 
        			
        			<input type="submit" name="firstsubmit" value="Ajouter"
        				class="boutton" />
        
        		</form>
      			
    		</div>
    	</div>
    	
    	<div class=flex4>
    		<button type="button" class="accordion" name="button">Statistiques</button>
    		<div class="panel4">
    			<canvas id="myChart" width="400" height="250"></canvas>
    			<canvas id="myChart2" width="400" height="250"></canvas>
    		</div>
    	</div>
    	
    <div class=panel3>
   	    <div class ="checktitle">Consommation Globale</div> 
   	    <span class="radio">
    	<input type="radio" name="conso" id="case1"  value="electricite" checked="checked" /><label for="case1">Electricite</label><br />
		</span>
		<span class="radio">
		<input type="radio" name="conso" id ="case2" value="eau" /><label for="case2">Eau</label><br />
    	</span>
    	
    	<div class="checktitle">Intervalle de temps</div> 
    	<span class="radio">
    	<input type="radio" name="temps" id="case3"  value="semaines" /><label for="case3">Semaines</label><br />
		</span>
		<span class="radio">
		<input type="radio" name="temps" id ="case4" value="mois" checked="checked" /><label for="case4">Mois</label>
    	</span>
    </div>
    	
		
		
    </div>
    
	<?php require ('../../footer.php')?>
	
</body>
</html>


	<script type="text/javascript">

	
	elec1();

	function elec1() {

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

	
	var x = document.getElementById("case1");

	 x.onclick = function elec() {

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

	 var y = document.getElementById('case2');
	 
		y.onclick = function water(){
			
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
























