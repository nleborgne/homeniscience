/**
 * Created by PhpStorm.
 * User: ksina
 * Date: 09/05/2018
 * Time: 11:15
 */
<?php
// Le message
$message = "Hey\r\nSalut\r\nBjr";

// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Envoi du mail
mail('ksinant.tristan@gmail.com', 'Hey', $message);
?>