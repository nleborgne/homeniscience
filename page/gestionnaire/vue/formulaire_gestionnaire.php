<?php
if(!isset($_SESSION)){
    session_start();
}
?>

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
  <link rel="stylesheet" href="../css/non_gestionnaire.css">
</head>

<body>
	
	<?php require ('../../header.php');
	require('../controller/ajout_gestionnaire_controller.php'); ?>

	
	<section class="form_gest" />
	<h1>Gestionnaire, c'est quoi ?</h1>
	<article>
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
	</article>
	
		<form method="post" action="../controller/ajout_gestionnaire_controller.php" enctype="multipart/form-data" class="form">
			<p>Nom du domicile :</p>
			<input type="text" name="nom_domicile" size="50" placeholder="Choisissez un nom pour votre domicile"/>
			
			<div class="row">
			<p class="type_habitation">Type d'habitation : &nbsp</p>
			<select name="choix" class="choix">
                <?php while($ID_hab=$ID_habitation->fetch()){?>
				<option value="<?php echo $ID_hab['ID'] ?>"><?php echo $ID_hab['nom_type'] ?></option>
				<?php } ?>
			</select>
			</div>
		
			<p>Numéro :</p>
			<input type="text" name="numero" size="50" placeholder="Numero de rue" required/>
		
			<p>Rue :</p>
			<input type="text" name="rue" size="50" placeholder="Nom de rue" required/>
		
			<p>Code Postal :</p>
			<input type="text" name="postal" size="50" placeholder="Code postal" required/>
		
			<p>Pays :</p>
			<input type="text" name="pays" size="50" placeholder="Pays" required/>
		
			<p>Nombre de Pieces :</p>
			<input type="text" name="nbre_piece" size="50" placeholder="Nombre de pieces dans votre habitation" required/>
		
			<p>Superficie :</p>
			<input type="text" name="superficie" size="50" placeholder="Superficie de l'habitation" required/>
			
			<div class="row">
			<input type="checkbox" name="cgu" id="case1" class="check_cgu" />
			<label for="case1" class="CGU">J'accepte les <a href="#">CGU</a></label>
			</div>
			
			<input type="submit" value="Valider" class="submit"/>
			
		
		</form>
	
	</section>
	
	<p></p>

	<?php require ('../../footer.php')?>
	
</body>
</html>



