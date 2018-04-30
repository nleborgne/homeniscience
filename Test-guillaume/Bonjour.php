<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super site</title>
    </head>
 
    <body>
	<?php
	
		if( isset($_GET['prenom']) && isset($_GET['nom']))
		{
			echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] ;
		}
		
		?>
		<br/>
		
		<?php
		if( isset($_POST['prenom']) && isset($_POST['nom']))
		{
			echo 'Bonjour ' . $_POST['prenom'] . ' ' . $_POST['nom'] . '! ';
			echo 'Vous venez de ' . $_POST['Pays'] . '! ';
		}
		
	?>
    </body>
</html>