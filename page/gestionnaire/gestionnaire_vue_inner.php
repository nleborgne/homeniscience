
<div class="container">
      	<?php 
      	while ($donnees = $domicile->fetch())
        {
            echo '<div class="flex1">';
            echo '<form method="GET" action="appart_description.php" enctype="multipart/form-data"><input type="button"
    name="'.$donnees['nom'].'" value="'.$donnees['nom'].'" class="accordion" title="Afficher le detail" OnClick="window.location.href=\'appart_description.php?id='.$donnees['ID'].'\'"></form>';  
            echo '<div class="panel">';
            echo '<p><strong>Adresse</strong> : '.$donnees['numero_habitation'].' '. $donnees['rue'].'</p>';
            echo '<h3>Consulter la consommation</h3>';
            echo ' <p> Consommation d\'eau :</p>
			<p class="afficher">Afficher le graphe</p>
            <div class="sample">
            	<canvas class="myChart" width="400" height="250"></canvas>
            </div>
            
            <p> Consommation d\'electricit&eacute :</p>
            <p class="afficher2">Afficher le graphe</p>
            <div class="sample2">
            	<canvas class="myChart" width="400" height="250"></canvas>
            </div>';
           
            echo '<h3 class="bareme">Bareme de consommation</h3>';
            echo '<label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>';
            ?>
            <input type="range" value="0" max="1000" min="0" step="50" onchange="updateTextInput(this.value);"></input>
            <p id="textInput">0</p>
			<?php 
             
            echo '</div>';
            echo '</div>';
        }
        ?>

   </div>
      
  <script type="text/javascript">
  
  var c = document.getElementsByClassName("sample2")[0];
  var d = document.getElementsByClassName("afficher2")[0];
   document.getElementsByClassName("afficher2")[0].onclick = function() {
 	  	if(c.style.height != '200px') {
 		  	d.innerHTML = "Cacher le graphe";
 	    c.style.height = '200px';
 	  	}else {
 		  	d.innerHTML = "Afficher le graphe";
 		  	c.style.height='0';
 	}
   }
  
 var a = document.getElementsByClassName("sample")[0];
 var b = document.getElementsByClassName("afficher")[0];
  document.getElementsByClassName("afficher")[0].onclick = function() {
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

  function updateTextInput(val) {
      document.getElementById('textInput').innerHTML = val; 
    }



  var ctx = document.getElementsByClassName("myChart")[1].getContext('2d');
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

	var crx = document.getElementsByClassName("myChart")[0].getContext('2d');
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
	
  </script>






