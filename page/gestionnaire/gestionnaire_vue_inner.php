
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
  
   			<input type="range" value="0" max="1000" min="0" step="50" onchange="updateTextInput(this.value);"></input>
   			<p id="textInput">0</p>
    		<h3>Bareme d'eau</h3>
    		<label class="switch">
   			   		<input type="checkbox">
    				<span class="slider round"></span>
    			</label>
  
   			<input type="range" value="0" max="1000" min="0" step="50" onchange="updateTextInput2(this.value);"></input>
   			<p id="textInput2">0</p>
    	</div>
    </div>
   	
   	<div class="flex5">
   	<div class=panel5>
   	    <div class ="checktitle">Consommation Globale</div> 
   	    <span class="radio">
    	<input type="radio" name="conso" id="case1"  value="electricite" checked="checked" onclick="elec()"/><label for="case1">Electricite</label><br />
		</span>
		<span class="radio">
		<input type="radio" name="conso" id ="case2" value="eau" onclick="water()"/><label for="case2">Eau</label><br />
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
    
<div class="container">
  <?php
  $compteur = 0;
  while ($donnees = $domicile->fetch())
  {
    echo '<div class="flex1">';
    echo '<form method="GET" action="appart_description.php" enctype="multipart/form-data"><input type="button"
    name="'.$donnees['nom'].'" value="'.$donnees['nom'].'" class="accordion" title="Afficher le detail" OnClick="window.location.href=\'appart_description.php?id='.$donnees['ID'].'\'"></form>';
    echo '<div class="panel2">';
    echo '<p><strong>Adresse</strong> : '.$donnees['numero_habitation'].' '. $donnees['rue'].'</p>';
    echo '<form method="GET" action="appart_description.php" enctype="multipart/form-data"><input type="button"
    name="Consulter la consommation" value="Consulter la consommation" class="consulter" title="Afficher le detail" OnClick="window.location.href=\'appart_description.php?id='.$donnees['ID'].'\'"></form>';
    
    echo '<h3>Liste des utilisateurs</h3>';
    
    ?>
    	<?php 
    	$domicil = $donnees['id_domicile'];
    	
    	$reponse = $bdd->prepare("SELECT nom, prenom FROM utilisateur WHERE ID_domicile= ? ");
    	$reponse -> execute(array($domicil));
    	?>
    			<ul title="Contacter" class="list_user">
    		<?php
    		while ($utilisateurs = $reponse->fetch()) {
    		    echo '<li>'.$utilisateurs['prenom'].' '.$utilisateurs['nom'].'</li>';
    	   }
    	   ?>
      			</ul>
        
            




            <?php
        
        ?>
     <?php 		
/* 
    echo '<h3 class="bareme">Bareme de consommation</h3>';
    echo '<label class="switch">
    <input type="checkbox">
    <span class="slider round"></span>
    </label>';
    ?>
    <input type="range" value="0" max="1000" min="0" step="50" onchange="updateTextInput(this.value);"></input>
    <p class="textInput">0</p>
    <?php
*/
    echo '</div>';
    echo '</div>';
    
  }
  ?>

</div>

<script type="text/javascript">

elec();

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


function updateTextInput(val) {
  document.getElementById('textInput').innerHTML = val;
}

function updateTextInput2(val2) {
	  document.getElementById('textInput2').innerHTML = val2;
	}


</script>
