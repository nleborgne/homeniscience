<!DOCTYPE HTML>

<button><a href="envoi_trame.php?id=1">Allumer le moteur</a></button>
<button><a href="envoi_trame.php?id=2">Éteindre le moteur</a></button>
<?php
if ($_GET['id'] == 1) {
    $trame = "1009C13021111";
    $targetURL = "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009C&TRAME=" . $trame;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $targetURL);
    curl_exec($ch);
    curl_close($ch);
} else if ($_GET['id'] == 2) {
    $trame = "1009C13020000";
    $targetURL = "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009C&TRAME=" . $trame;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $targetURL);
    curl_exec($ch);
    curl_close($ch);
}
