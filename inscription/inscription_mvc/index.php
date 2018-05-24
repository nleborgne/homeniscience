<?php
if (isset($_SESSION)) {
    session_destroy();
}
require("Controller/functions_controller.php");
require("Controller/inscription.php");

if(test_remplissage($_POST)){
    traitement_form();
}
require('Vue/vue_inscription.php');
