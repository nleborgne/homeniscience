<!DOCTYPE html >
<html>
    <head>
        <meta charset="utf-8" >
        <title> Lire et écrire dans un fichier </title>
    </head>

    <body>
    <?php
    // on ouvre le fichier
    $FichierTxt = fopen('Test.txt', 'r+');
    //on lit le fichier
    $Texte = fgets($FichierTxt);
    echo $Texte;
    echo '<br>';
    $Texte = fgets($FichierTxt);
    echo $Texte;
    // on écrit du texte
    fseek($FichierTxt, 0);
    fputs($FichierTxt, ' voici mon texte');
    // on ferme le fichier
    fclose($FichierTxt);

    ?>
    </body>
</html>