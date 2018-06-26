<?php
function getCGU() {
    global $bdd;
    $get = $bdd->query("SELECT contenu FROM cgu_accueil ORDER BY date,ID DESC LIMIT 1");
    return $get->fetch();
}