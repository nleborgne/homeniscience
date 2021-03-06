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
  <title>Non-gestionnaire</title>
  <link rel="stylesheet" href="../css/non_gestionnaire.css">
</head>

<body>
	<header>
  		<?php require ('../../header.php'); ?>
  	</header>
  	
  	<div class="new_gest">
        <div class="conteneur">
            <p>Vous n'êtes pas gestionnaire, vous n'avez pas accès à cette page.</p>
            <button onclick="window.location='formulaire_gestionnaire.php';">Devenir Gestionnaire</button>
        </div>
	</div>
	
	<?php require ('../../footer.php')?>

</body>
</html>