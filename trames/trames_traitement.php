<?php

// PAGE DE TEST DES TRAMES
// PAS DE MVC IL SERA AJOUTÉ PAR LA SUITE

require('Trame.php');

require('../connexion_bdd.php');

function verifTrame($i)
{

    $sub0 = substr($i, 7, 1);
    $sub1 = (int)substr($i, 8, 2);
    $sub3 = (int)substr($i, 20, 4);
    $sub4 = (int)substr($i, 24, 2);
    $sub5 = (int)substr($i, 26, 2);
    $sub6 = (int)substr($i, 28, 2);
    $sub7 = (int)substr($i, 30, 2);
    $sub8 = (int)substr($i, 32, 2);


    if (is_numeric($sub0) && is_numeric($sub1)) {
        // verif annee
        if (gettype($sub3) == "integer" && $sub3 > 2000) {
            // verif mois
            if (gettype($sub4) == "integer" && $sub4 > 0 && $sub4 < 13) {
                // verif jour
                if (gettype($sub5) == "integer" && $sub5 > 0 && $sub5 < 32) {
                    // verif heure
                    if (gettype($sub6) == "integer" && $sub6 >= 0 && $sub6 <= 23) {
                        // verif minute
                        if (gettype($sub7) == "integer" && $sub7 >= 0 && $sub7 < 60) {
                            // verif seconde
                            if (gettype($sub8) == "integer" && $sub8 >= 0 && $sub8 < 60) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}

// LIRE AVEC CURL
$lien = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=009C";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $lien);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$data = curl_exec($ch);
curl_close($ch);


// On ouvre le fichier log
$log = file("log.txt");

$trameArray = array();

// NOUVELLE APPROCHE -> RECUPERER LES TRAMES PAR LA FIN
for ($i = strlen($data); $i >= 0; $i--) {
    // Vérifier si la trame est respecte le bon format
    if (substr($data, $i, 5) == "1009" && strlen(substr($data, $i, 33)) == 33) {
        // On vérifie avec le log
        if (substr($data, $i, 33) == $log[0]) {
            echo "log rencontré <br>";
            break;
            // Vérifier que les valeurs sont bien du bon type
        } else if (verifTrame(substr($data, $i, 33))) {
            // On ajoute dans un tab de trames
            array_push($trameArray, new Trame(substr($data, $i, 33)));
        }
    }
}
// A la fin, on update le log
if (count($trameArray) != 0) {
    file_put_contents("log.txt", $trameArray[0]->getTrame());
    // On ajoute les trames
    $sql = 'INSERT INTO statistiques(ID_equipement,ID_type_equipement,date,donnee,trame) VALUES ';
    for ($i = 0; $i < count($trameArray); $i++) {
        $sql .= '("' . $trameArray[$i]->getNumeroCapteur() . '","' . $trameArray[$i]->getTypeCapteur() . '","' . $trameArray[$i]->getDate() . '","' . $trameArray[$i]->getValeur() . '","' . $trameArray[$i]->getTrame() . '")';
        if ($i < (count($trameArray) - 1)) {
            $sql .= ',';
        }
    }
    // On effectue la requête
    $result = $bdd->query($sql);
    echo "Tout s'est bien passé";
} else {
    echo "Rien à ajouter";
}
