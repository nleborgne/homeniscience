<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require('modele_connexion.php');

// Si le get n'est pas défini, on appelle d'abord la 1ere vue
if (!isset($_GET['mail']) && !isset($_GET['code']) && !isset($_GET['mdp'])) {
    require('vue_oubli.php');

// Si le mail est reçu, on envoie un mail et on affiche la vue
} else if (isset($_GET['mail'])) {
    // On créé d'abord le code de vérification
    $code = creationCode();
    $ID_user = getUserID($_GET['mail']);

    // On ajoute le code dans la BDD
    insertCode($code, $_GET['mail']);

    /// On envoie ensuite le code par mail
    if ($ID_user['ID'] != "") {
        sendMail($code, $_GET['mail']);
    }
    require('vue_oubli_code.php');

// Si le code est entré, on appelle la vue
} else if (isset($_GET['code']) && isset($_GET['mail2'])) {
    if (compareCode($_GET['code'], $_GET['mail2'])) {
        // Afficher vue changement MDP
        require('vue_oubli_nv_mdp.php');
        $error = "";
    } else {
        // afficher erreur
        $error =  '<p style="color:red;text-align:center; font-family:\'Lato\',sans-serif"> Le code entré est invalide</p>';
        $_GET['mail'] = $_GET['mail2'];
        require('vue_oubli_code.php');
    }
} else if(isset($_GET['mdp']) && isset($_GET['mdp2']) && isset($_GET['mail3'])) {
    // comparer les mdp
    if($_GET['mdp'] == $_GET['mdp2']){
        // si les mdp correspondent, on update la BDD
        updateMdp($_GET['mdp'],$_GET['mail3']);
        header('Location:vue_connexion.php');
    }
}


function creationCode()
{
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $code = array();
    $longueur = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $longueur);
        $code[] = $alphabet[$n];
    }
    return implode($code);
}

function sendMail($code, $user)
{
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '';                 // SMTP username
        $mail->Password = '';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('support@homeniscience.fr', 'Homeniscience');
        $mail->addAddress($user);     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Votre code de reinitialisation de mot de passe';
        $mail->Body = '<p>Bonjour, voici votre code pour réinitialiser votre mot de passe :</p><p>' . $code . '</p>';
        $mail->AltBody = 'Bonjour voici votre code pour reinitialiser votre mot de passe : ' . $code;

        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}