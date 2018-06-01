<?php

// PAGE DE TEST DES TRAMES
// PAS DE MVC IL SERA AJOUTÉ PAR LA SUITE

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

$newArray = str_split($data, 33);

$file = "trames.txt";
$fopen = fopen($file, 'r');
$fread = fread($fopen, filesize($file));
fclose($fopen);

// Tableau de trames
$trameArray = array();

// PATTERN : "1009C"
for ($i = 0; $i < strlen($fread); $i++) {
    if (substr($fread, $i, 5) == "1009C") {
        array_push($trameArray, new Trame(substr($fread, $i, 33)));
    }
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
foreach ($trameArray as $trame) {
    $get = $bdd->prepare('SELECT * from statistiques WHERE trame = ?');
    $get->execute(array($trame->getTrame()));
    $count = $get->rowCount();
    if ($count > 0) {
        echo "<p>déjà dans BDD </p>";
    } else {
        $insert = $bdd->prepare('INSERT INTO statistiques(ID_equipement,ID_type_equipement,date,donnee,trame) VALUES(:ID_equipement,:ID_type_equipement,:date,:donnee,:trame)');
        $insert->execute(array(
            'ID_equipement' => $trame->getNumeroCapteur(),
            'ID_type_equipement' => $trame->getTypeCapteur(),
            'date' => $trame->getAnnee() . "-" . $trame->getMois() . "-" . $trame->getJour() . "-" . $trame->getHeure() . "-" . $trame->getMinute() . "-" . $trame->getSeconde(),
            'donnee' => $trame->getValeur(),
            'trame' => $trame->getTrame()
        ));
        echo "<p>Requête ajoutée</p>";
    }
}