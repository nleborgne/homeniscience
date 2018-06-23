<?php
/* Contrôleur pour la page d'accueil*/
if (!isset($_SESSION)) {
    session_start();
}
/* Appel du modèle */
require('accueil_modele.php');
$ID_user = $_SESSION['ID'];

$ID_domicile = ID_domicile($_SESSION['ID']);
//echo $ID_domicile;
$messageforum = Afficher_message($ID_domicile);
$domicile = Afficher_domicile($ID_domicile);

$ValTemp0 = getValeurTemperature();
$ValTempArr= str_split($ValTemp0['donnee']);

try {
    $infos = getUserInfos();
    $afficherPieces = getPieces();
    require('accueil_vue.php');
    if (isset($_POST['ajouter']) && !empty($_POST['msg_forum'])) {
        echo 'index ok';

        Ajouter_message($ID_domicile, $_POST['msg_forum'], $ID_user);
        //echo("<meta http-equiv='refresh' content="3'; url=index.php#forummsg">");
        echo '<meta http-equiv="refresh" content="0; url=index.php#forummsg">';
    }
    if (isset($_POST['ajouterdomicile'])) {
        echo '<meta http-equiv="refresh" content="0; url=../domicile/index.php">';

    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
