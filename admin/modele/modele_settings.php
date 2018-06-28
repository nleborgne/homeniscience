<?php

function getCGU() {
    global $bdd;
    $get = $bdd->query("SELECT contenu FROM cgu_accueil ORDER BY date,ID DESC LIMIT 1");
    return $get->fetch();
}

function postCGU($contenu) {
    global $bdd;
    $insert = $bdd->prepare("INSERT INTO cgu_accueil(ID_type,date,contenu) VALUES(1,NOW(),:contenu)");
    $insert->bindParam('contenu',$contenu);
    $insert->execute();
    $insert->closeCursor();
}

function delete($email) {
    global $bdd;
    $delete = $bdd->prepare("DELETE FROM utilisateur WHERE email = :email");
    $delete->bindParam('email',$email);
    $delete->execute();
    $delete->closeCursor();
}