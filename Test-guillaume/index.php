<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super site</title>
    </head>
 
    <body>
		<p>
			<a href = "http://localhost/Test/Bonjour.php?prenom=Jean&nom=Michel" > Dites bonjour !  </a>
			
		</p>
		
		<p>
			Cette page ne contient que du HTML.<br />
			Veuillez taper votre prénom :
		</p>
		<p>
		echo "rentrez votre pays d'origine";
		<form action="Bonjour.php" method="post">	
			<select name = "Pays">
				<option value = "France" selected = "selected"> France </option>
				<option value = "Belgique"> Belgique </option>
				<option value = "Royaume-Uni"> Royaume-Uni </option>
				<option value = "Espagne"> Espagne </option>
				echo <br>;
			</select>
				<input type="text" name="prenom" />
				<input type="text" name="nom" />
				<input type="submit" value="Valider" />
		</p>
		</form>
	</body>
</html>