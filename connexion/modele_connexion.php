<?php
try //préparation du fichier au cas où des erreurs surviennent
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
//$url = "../page/accueil/accueil_vue.php"; //définition de l'URL à laquelle accéder en cas de sccès de la connexion
function connexion()
{
    global $bdd;
    $reponse = $bdd->query('SELECT ID, email, mot_de_passe,prenom,nom FROM utilisateur');
    //$reponse->closeCursor();

    return $reponse;
}

function getUserID($mail)
{
    global $bdd;
    $insert = $bdd->prepare('SELECT ID from utilisateur WHERE email = :email');
    $insert->bindParam('email', $mail);
    $insert->execute();
    return $insert->fetch();
}

function insertCode($code, $mail)
{
    global $bdd;
    $data = getUserID($mail);
    $insert = $bdd->prepare('INSERT INTO code_oubli(code,ID_utilisateur) VALUES(:code,:ID_utilisateur)');
    $insert->bindParam('code', $code);
    $insert->bindParam('ID_utilisateur', $data['ID']);
    $insert->execute();
}

function compareCode($code,$mail)
{
    global $bdd;
    $select = $bdd->prepare('SELECT code from code_oubli WHERE ID_utilisateur = :ID_u ORDER BY ID DESC LIMIT 1');
    $select->bindParam('ID_u',getUserID($mail)['ID']);
    $select->execute();
    // On a le code
    $codeBDD = $select->fetch();

    if($codeBDD['code'] == $code) {
        return true;
    } else {
        return false;
    }
}

function updateMdp($mdp,$email) {
    global $bdd;
    $hash = password_hash($mdp,PASSWORD_DEFAULT);
    $update = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = :mot_de_passe WHERE ID = :ID_u');
    $update->bindParam('mot_de_passe',$hash,PDO::PARAM_STR);
    $update->bindParam('ID_u',getUserID($email)['ID']);
    $update->execute();

    // On supprime ensuite le code dans la BDD
    $delete = $bdd->prepare('DELETE from code_oubli WHERE ID_utilisateur = :ID_u');
    $delete->bindParam('ID_u',getUserID($email)['ID']);
    $delete->execute();

}