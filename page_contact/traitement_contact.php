<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('SELECT ID FROM utilisateur WHERE ID = ?');
$req->execute(array($_GET[''])); //à compléter pour que la ligne de la table avec l'ID de l'user connecté au site

$req = $reponse->fetch();
$session = $req[ID];
session_start();
$_SESSION["newsession"]=$session;
?>
<a href="mailto:tksinant@juniorisep.com?subject=&body=<?php $_POST['message']?>">valider</a> <!-- Il manque l'ajout dynamique de l'adresse mail de l'user -->
