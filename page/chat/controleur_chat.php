<?php

require('../../connexion_bdd.php');

// On importe le modèle
require('modele_chat.php');

// On récupère les messages
$messages = getMessages($_SESSION['ID'],$_SESSION['ID']);

if(isset($_POST['submitForm'])) {
    ajouterMessage($_SESSION['ID'],0,$_POST['contenu']);
    $messages = getMessages($_SESSION['ID'],$_SESSION['ID']);
}

// On importe la vue
require('vue.php');