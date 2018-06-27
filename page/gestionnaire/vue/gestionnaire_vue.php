<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width">
  <title>Gestionnaire</title>
  <link rel="stylesheet" href="../css/gestionnaire.css">
</head>

<body>
	<header>
  		<?php require ('../../header.php'); ?>
  	</header>
  	
  	<div class="container2">
  		<h3>Selectionner un domicile pour y acceder : &nbsp</h3>
      		<select  onchange="location.href='#'+this.value">
      			<option value="" disabled selected>Aller a un appartement ...</option>
      			<?php 
      			while ($donnees1 = $domicile1 -> fetch()) { ?>
      				<option value="<?php echo $donnees1['ID']; ?>"><?php echo $donnees1['nom']; ?></option>
      			<?php    
      			}
      			?>
      		</select>
  	</div>
  	
  	
	<div class="container">

	<div class=flex3>
    	<button type="button" class="accordion" name="button">Statistiques Globales de Consommation</button>
    	<div class="panel">
    		<canvas id="myChart" width="400" height="250"></canvas>
    		<canvas id="myChart2" width="400" height="250"></canvas>
    	</div>
    </div>
   <div class="checkpart">
    <div class="flex1">
    	<button type="button" class="accordion" name="button">Bareme de consommation</button>
    	<div class="panel2">
    		<h3>Bareme d'electricite</h3>
    	    	<label class="switch">
   			   		<input type="checkbox">
    				<span class="slider round"></span>
    			</label>
  
   			<input type="range" value="0" max="1000" min="0" step="50" onchange="updateTextInput(this.value);" />
   			<p id="textInput">0</p>
    		<h3>Bareme d'eau</h3>
    		<label class="switch">
   			   		<input type="checkbox">
    				<span class="slider round"></span>
    			</label>
  
   			<input type="range" value="0" max="1000" min="0" step="50" onchange="updateTextInput2(this.value);" />
   			<p id="textInput2">0</p>
    	</div>
    </div>
   	
   	<div class="flex5">
   	<div class=panel5>
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
   </div>
</div>
    
    <h1 class="dom">Domiciles</h1>
    
    <div>
    	<button class="consulter" onclick="window.location='../vue/formulaire_gestionnaire.php';">Ajouter un nouveau domicile</button>
    </div>
    
<div class="container">
  <?php
  
  while ($donnees = $domicile->fetch())
  {
      ?>
    <div class="flex1">
    	<form method="GET" action="appart_description.php" enctype="multipart/form-data"><input type="button"
    name="appart" value="<?php echo $donnees['nom']; ?>" class="accordion" id="<?php echo $donnees['ID']; ?>" title="Afficher le detail" OnClick="window.location.href='appart_controller.php?id=<?php echo $donnees['ID']?>'"></form>
    	<div class="panel2">
    		<p><strong>Adresse</strong> : <?php echo $donnees['numero_habitation'].' '. $donnees['rue']; ?></p>
    	<form method="GET" action="appart_description.php" enctype="multipart/form-data"><input type="button"
    name="Consulter la consommation" value="Consulter la consommation" class="consulter" 
    title="Afficher le detail" OnClick="window.location.href='appart_controller.php?id=<?php echo $donnees['ID']?>'"></form>
    
    <h3>Liste des utilisateurs</h3>
    
    	<?php 
    	$reponse = User($donnees['id_domicile']);
    	?>
    			<ul title="Contacter" class="list_user">
    		<?php
    		while ($utilisateurs = $reponse->fetch()) {
    		    echo '<li>'.$utilisateurs['prenom'].' '.$utilisateurs['nom'].'</li>';
    	   }
    	   ?>
      			</ul>	
    	</div>
    </div>
  <?php
  }
  ?>

</div>
	
	<?php require ('../../footer.php')?>
	
	<script type="text/javascript">

elec1()

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


function updateTextInput(val) {
  document.getElementById('textInput').innerHTML = val;
}

function updateTextInput2(val2) {
	  document.getElementById('textInput2').innerHTML = val2;
	}


</script>
	
</body>
</html>












