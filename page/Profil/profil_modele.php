<?php
function getUtilisateur()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->query('SELECT id, email, mot_de_passe, nom, prenom FROM utilisateur');

    return $req;
}
?>