<?php
try //préparation du fichier au cas où des erreurs surviennent
{
    $bdd = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', 'tristank', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$url = "../accueil/accueil_vue.php"; //définition de l'URL à laquelle accéder en cas de sccès de la connexion

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
    echo "Echec de la connexion. Veuillez réessayer.";
    echo "<a href='vue_connexion.php'>Connexion</a>";
$reponse->closeCursor(); //termine le traitement de la requête
?>