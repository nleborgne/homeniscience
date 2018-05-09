<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

function ID_domicile($ID_utilisateur_principal)
{
    global $bdd;
    $ID = $bdd->query("SELECT ID FROM domicile WHERE ID_utilisateur_principal=$ID_utilisateur_principal");
    $ID_domicile=$ID->fetch();

    return $ID_domicile['ID'];
    $ID->closeCursor();

}





function Affdomicile($ID_utilisateur_principal)
{
    global $bdd;
    $domicile = $bdd->query("SELECT nom,numero_habitation,rue,code_postal,superficie FROM domicile WHERE ID_utilisateur_principal=$ID_utilisateur_principal");
    return $domicile;
    $domicile->closeCursor();
}






function Adddomicile($ID_utilisateur_principal,$nom,$size,$num,$rue,$cp,$pays)
{
    global $bdd;
    $requete = $bdd ->prepare('INSERT INTO domicile(ID,ID_utilisateur_principal,nom,nombre_pieces,superficie,ID_type_habitation,numero_habitation,rue,code_postal,pays,ID_confidentialite,ID_gestionnaire)
                                VALUES (:ID,:ID_utilisateur_principal,:nom,:nombre_pieces,:superficie,:ID_type_habitation,:numero_habitation,:rue,:code_postal,:pays,:ID_confidentialite,:ID_gestionnaire)');
    $requete ->execute(array(
        'ID' =>NULL,
        'ID_utilisateur_principal' => $ID_utilisateur_principal,
        'nom' => $nom,
        'nombre_pieces' => 0,
        'superficie' =>$size,
        'ID_type_habitation' =>1,
        'numero_habitation' =>$num,
        'rue' =>$rue,
        'code_postal' =>$cp,
        'pays' =>$pays,
        'ID_confidentialite' =>1,
        'ID_gestionnaire'=>0,
    ));

}



function delldiomicile($ID)
{
    global $bdd;
    $req = $bdd->exec('DELETE FROM domicile WHERE ID='.$ID.' ');


}





function addpiece($nom,$ID_domicile){
    global $bdd;
    $requete = $bdd->prepare('INSERT INTO piece(ID,ID_domicile,nom,nombre_capteurs)
                 VALUES (:ID,:ID_domicile,:nom,:nombre_capteurs)');
    $requete->execute(array(
        'ID' => NULL,
        'ID_domicile' => $ID_domicile,
        'nom' => $nom,
        'nombre_capteurs' => 0,

    ));


}





function Affpiece($ID_domicile)
{
    global $bdd;
    $piece = $bdd->query("SELECT nom,ID FROM piece WHERE ID_domicile=$ID_domicile  ");
    return $piece;
    $piece->closeCursor();
}







function dellpiece($ID_domicile,$nom_piece)
{
    global $bdd;
    $req = $bdd->exec('DELETE FROM piece WHERE nom="'.$nom_piece.'" AND ID_domicile="'.$ID_domicile.'"' );


}







function Afftypecapt()
{
    global $bdd;
    $reponse_capteur = $bdd->query("SELECT nom_type,ID FROM type_equipement ORDER BY ID");
    return $reponse_capteur;
    $reponse_capteur->closeCursor();
}








function Addcapt($ID_piece,$nom,$type)
{
    global $bdd;
    $requete = $bdd ->prepare('INSERT INTO equipement( ID ,ID_piece ,nom, ID_type_equipement )
                              VALUES ( :ID , :ID_piece , :nom , :ID_type_equipement )');
    $requete ->execute(array(
        'ID' =>NULL,
        'ID_piece' => $ID_piece,
        'nom' => $nom,
        'ID_type_equipement' => $type,


    ));
}






function Affcapt($ID_domicile)
{
    global $bdd;
    $capt = $bdd->query("SELECT equipement.nom,equipement.ID FROM equipement JOIN piece ON equipement.ID_piece = piece.ID WHERE piece.ID_domicile=$ID_domicile ");
    return $capt;
    $capt->closeCursor();
}





function dellcapt($ID_cap)
{
    global $bdd;
    $req = $bdd->exec('DELETE FROM equipement WHERE ID="'.$ID_cap.'"  ' );
}





function Affmail($recherche)
{
    global $bdd;
    $reponse_ajout = $bdd->query("SELECT email FROM utilisateur WHERE nom='".$recherche."'  ");
    return $reponse_ajout;
    $reponse_ajout->closeCursor();
}








function Adduser($ID,$ID_domicile)
{
    global $bdd;
    $member= $ID;
    $dom=$ID_domicile;
    $sql = "UPDATE utilisateur SET ID_domicile=:ID_domicile WHERE ID=:ID";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array(
        'ID' => $member,
        'ID_domicile' => $dom
    ));
}







function Affuseradd($ID_domicile)
{
    global $bdd;
    $reponse_ajout = $bdd->query("SELECT prenom,ID FROM utilisateur WHERE ID_domicile=$ID_domicile  ");
    return $reponse_ajout;
    $reponse_ajout->closeCursor();
}






function delluser($ID)
{
    global $bdd;
    $member= $ID;
    $sql = "UPDATE utilisateur SET ID_domicile=0 WHERE ID=:ID";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array(
        'ID' => $member
    ));
}


?>



