<?php
session_start();

require('../../connexion_bdd.php');

// On importe le modèle
require('../modele/modele_chat.php');

// On récupère les utilisateurs
$user = getUsers();

// On récupère les messages
$messages = getMessages($_SESSION['ID'],$_GET['id']);

if(isset($_POST['submitForm'])) {
    if(ajouterMessage($_SESSION['ID'],$_GET['id'],$_POST['contenu'])) {
        $messages = getMessages($_SESSION['ID'],$_GET['id']);
    }
}

// On importe la vue
require('../vue/vue.php');