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
<header class="header_non_gest">
    <?php require ('../../header.php');
    require('../controller/ajout_gestionnaire_controller.php'); ?>
</header>
<body>

	<section class="form_gest" >
	<h1>Gestionnaire, c'est quoi ?</h1>
	<article>
		<p>Si vous êtes chef d'une résidence, propriétaire de locations,
	gérant d'un hôtel ... alors cette section est faite pour vous !</p>
	
		<p>Il suffit d'ajouter au moins un domicile vous appartenant et que vous comptez
	utiliser pour d'autres utilisateurs.</p>
	
		<p>Vous n'aurez pas accès aux informations relatives au données des capteurs,
	ce serait une atteinte à la vie privée ! Pour en savoir plus, lisez les
	<a href="#">CGU</a>.</p>
	
		<p>En revanche, toutes les données utiles et pratiques vous seront accessibles,
	comme la lecture de statistiques, la maîtrise d'un plafond de consommation,
	l'ajout d'utilisateurs et encore d'autres ! </p>
	
		<p>Pour commencer, veuillez remplir ce formulaire d'ajout de votre premier 
	domicile en tant que gestionnaire :</p>
	</article>
	<div class="conteneurtop">
		<form method="post" action="../controller/ajout_gestionnaire_controller.php" enctype="multipart/form-data" class="form_habitation">
            <fieldset>
                <legend> Définir une nouvelle habitation </legend>
                <div class="row">
                    <div class="col-25">
                        <label for="nom_domicile">Nom du domicile :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nom_domicile" name="nom_domicile" placeholder="Choisissez un nom pour votre domicile">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="nom">Type d'habitation :</label>
                    </div>
                    <div class="col-75">
                        <select name="choix" class="choix">
                            <option id="defaut_choix" value="">Choisir un type d'habitation</option>
                            <?php while($ID_hab=$ID_habitation->fetch()){?>
                                <option value="<?php echo $ID_hab['ID'] ?>"><?php echo $ID_hab['nom_type'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="numero">Numéro :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="numero" name="numero" placeholder="Numéro de rue">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="rue">Rue :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="rue" name="rue" placeholder="Nom de rue">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="postal">Code postal :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="postal" name="postal" placeholder="Code postal">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="pays">Pays :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="pays" name="pays" placeholder="Pays">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="nbre_piece">Nombre de pièces :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nbre_piece" name="nbre_piece" placeholder="Nombre de pièce dans votre habitation">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="superficie">Superficie :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="superficie" name="superficie" placeholder="Superficie de votre habitation">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Ajouter">
                </div>
            </fieldset>
		
		</form>
    </div>
	</section>
	
	<p></p>

	<?php require ('../../footer.php')?>
	
</body>
</html>


