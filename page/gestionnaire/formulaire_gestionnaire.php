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
  <title>Accueil</title>
  <link rel="stylesheet" href="gestionnaire.css">
</head>

<body>
	
	<?php require ('../header.php'); ?>
	<section class="form_gest" />
	<h1>Gestionnaire, c'est quoi ?</h1>
	
	<p>Si vous etes chef d'une residence, proprietaire de locations, 
	gerant d'un hotel ... alors cette section est faite pour vous !</p>
	
	<p>Il suffit d'ajouter au moins un domicile vous appartenant et que vous comptez
	utiliser pour d'autres utilisateurs.</p>
	
	<p>Vous n'aurez pas acces aux informations relatives au donnees des capteurs,
	ce serait une atteinte a la vie privee ! Pour en savoir plus, lisez les
	<a href="#">CGU</a>.</p>
	
	<p>En revanche, toutes les donnees utiles et pratiques vous seront accessibles,
	comme la lecture de statistiques, la maitrise d'un plafond de consommation, 
	l'ajout d'utilisateurs et encore d'autres ! </p>
	
	<p>Pour commencer, veuillez remplir ce formulaire d'ajout de votre premier 
	domicile en tant que gestionnaire :</p>
	
	<form method="post" action="index.php" enctype="multipart/form-data">
		<p>Nom du domicile :</p>
		<input type="text" name="nom_domicile" size="30" />
		
		<p>Type d'habitation :</p>
		<select name="choix">
			<option value="Francais">Appartement</option>
			<option value="Anglais">Maison</option>
		</select>
		
		
		<p>Numero :</p>
		<input type="text" name="numero" size="30" />
		
		<p>Rue :</p>
		<input type="text" name="rue" size="30"/>
		
		<p>Code Postal :</p>
		<input type="text" name="postal" size="30" />
		
		<p>Pays :</p>
		<input type="text" name="pays" size="30" />
		
		<p>Nombre de Pieces :</p>
		<input type="text" name="nbre_piece" size="30" />
		
		<p>Superficie :</p>
		<input type="text" name="superficie" size="30"/>
		
		
	</form>
	
	</section>


	<?php require ('../footer.php')?>
	
</body>
</html>



