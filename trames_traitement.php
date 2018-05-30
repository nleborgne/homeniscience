<?php
require('Trame.php');

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=009A");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

$newArray = str_split($data,33);

$file = "trames.txt";
$fopen = fopen($file, 'r');
$fread = fread($fopen,filesize($file));
fclose($fopen);

// Tableau de trames
$trameArray = array();

// PATTERN : "1009C"
for($i = 0; $i < strlen($fread); $i++){
    if (substr($fread,$i,5) == "1009C") {
        array_push($trameArray,new Trame(substr($fread,$i,33)));
    }
}


echo $trameArray[0]->type_capteur();
echo " ";
echo $trameArray[0]->numero_capteur();
echo " ";
echo $trameArray[0]->getValeur();