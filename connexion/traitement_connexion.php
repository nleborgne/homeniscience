<?php
try //préparation du fichier au cas où des erreurs surviennent
{
  $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$url = "../page/accueil/index.php"; //définition de l'URL à laquelle accéder en cas de succès de la connexion

$reponse = $bdd->query('SELECT ID, email, mot_de_passe FROM utilisateur');

while($donnees = $reponse->fetch()) //vérification des données saisies avec celles de la BDD
{
  if($_POST['email'] == $donnees['email'] and password_verify ( $_POST['mot_de_passe'] , $donnees['mot_de_passe'] ) )
  {

    session_start(); //adaptation de la variable de session de l'utilisateur connecté
    $_SESSION['ID']=$donnees['ID'];
    echo $_SESSION['ID'];

    $reponse->closeCursor(); //terminer la première requete SQL
    header('Location:'.$url); //connexion à la page d'accueil du site Internet
  }
}
echo "<p>Echec de la connexion. Veuillez réessayer.</p>";
echo "<p><a href='vue_connexion.php'>Connexion</a></p>";
$reponse->closeCursor(); //termine le traitement de la requête

require ('modele_connexion.php');
?>
