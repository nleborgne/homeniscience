<?php
try //préparation du fichier au cas où des erreurs surviennent
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
//$url = "../page/accueil/accueil_vue.php"; //définition de l'URL à laquelle accéder en cas de sccès de la connexion
function connexion(){
    global $bdd;
    $reponse = $bdd->query('SELECT ID, email, mot_de_passe,prenom,nom FROM utilisateur');
    //$reponse->closeCursor();

    return $reponse;
}
?>