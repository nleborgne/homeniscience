<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', 'tristank', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$url = "../accueil/accueil_vue.php";

$reponse = $bdd->query('SELECT email, mot_de_passe FROM utilisateur');

while($donnees = $reponse->fetch())
{
    if($_POST['email'] == $donnees['email'] and $_POST['mot_de_passe'] == $donnees['mot_de_passe'])
    {
        header('Location:'.$url);
    }
}
?>

    <p>Echec de la connexion. Veuillez réessayer.</p>
    <a href="vue_connexion.php">Connexion</a>
<?php
$reponse->closeCursor(); // Termine le traitement de la requête
?>