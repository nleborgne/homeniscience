<?php

function Verification_domicile($ID_domicile)
{
    global $bdd;
    $domicile = $bdd->query("SELECT nom,numero_habitation,rue,code_postal,superficie,pays FROM domicile WHERE ID= $ID_domicile ORDER BY ID");
    $rue=$domicile->fetch();
    return $rue['rue'];
    $domicile->closeCursor();
}




function Verification_utilisateur($ID_utilisateur_principal)
{
    global $bdd;
        $ID= $ID_utilisateur_principal;
        $sql = "UPDATE utilisateur SET ID_type_utilisateur=2 WHERE ID=:ID";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array(
            'ID' => $ID
        ));


}




function verifcation_acces($ID_type){
    if($ID_type!=2){
        header('Location:transition/index.php');
    }

}


function ID_domicile($ID_utilisateur_principal)
{
    global $bdd;

    $ID = $bdd->query("SELECT ID FROM domicile WHERE ID_utilisateur_principal=$ID_utilisateur_principal");
    $ID_domicile=$ID->fetch();
    if ($ID_domicile>0){
        return $ID_domicile['ID'];
    }
    else{
        $ID_domicile=0;
        return $ID_domicile;
    }
    $ID->closeCursor();

}

function ID_domicile2($ID_SESSION)
{
    global $bdd;

    $ID = $bdd->query("SELECT ID_domicile FROM utilisateur WHERE ID=$ID_SESSION");
    $ID_domicile=$ID->fetch();
    if ($ID_domicile>0){
        return $ID_domicile['ID_domicile'];
    }
    else{
        $ID_domicile=0;
        return $ID_domicile;
    }
    $ID->closeCursor();

}

function ID_type($ID_SESSION)
{
    global $bdd;

    $ID = $bdd->query("SELECT ID_type_utilisateur FROM utilisateur WHERE ID=$ID_SESSION");
    $ID_type=$ID->fetch();
    if ($ID_type>0){
        return $ID_type['ID_type_utilisateur'];
    }
    else{
        $ID_type=0;
        return $ID_type;
    }
    $ID->closeCursor();

}





function Afficher_domicile($ID_domicile)
{
    global $bdd;
    $domicile = $bdd->query("SELECT nom,numero_habitation,rue,code_postal,superficie,pays FROM domicile WHERE ID= $ID_domicile ORDER BY ID");
    return $domicile;
    $domicile->closeCursor();
}






function Ajouter_domicile($ID_utilisateur_principal)
{
    global $bdd;
    if(isset($_POST['ajouter'])){
        if(!empty($_POST['nom']) AND !empty($_POST['rue'])  AND !empty($_POST['size']) ) {

            $requete = $bdd ->prepare('INSERT INTO domicile(ID,ID_utilisateur_principal,nom,nombre_pieces,superficie,ID_type_habitation,numero_habitation,rue,code_postal,pays,ID_confidentialite,ID_gestionnaire,consommation)
                                VALUES (:ID,:ID_utilisateur_principal,:nom,:nombre_pieces,:superficie,:ID_type_habitation,:numero_habitation,:rue,:code_postal,:pays,:ID_confidentialite,:ID_gestionnaire,:consommation)');
            $requete ->execute(array(
                'ID' =>NULL,
                'ID_utilisateur_principal' => $ID_utilisateur_principal,
                'nom' => $_POST['nom'],
                'nombre_pieces' => 0,
                'superficie' =>$_POST['size'],
                'ID_type_habitation' =>1,
                'numero_habitation' =>$_POST['num'],
                'rue' =>$_POST['rue'],
                'code_postal' =>$_POST['post'],
                'pays' =>$_POST['pays'],
                'ID_confidentialite' =>1,
                'ID_gestionnaire'=>0,
                'consommation'=>0,
            ));


        }

    }

}



function Ajouter_domicile2($ID_utilisateur_principal,$ID_domicile)
{
    global $bdd;
    if (isset($_POST['ajouter'])) {
        if (!empty($_POST['nom']) AND !empty($_POST['rue']) AND !empty($_POST['size'])) {

            $requete = $bdd->prepare('INSERT INTO domicile(ID,ID_utilisateur_principal,nom,nombre_pieces,superficie,ID_type_habitation,numero_habitation,rue,code_postal,pays,ID_confidentialite,ID_gestionnaire)
                                VALUES (:ID,:ID_utilisateur_principal,:nom,:nombre_pieces,:superficie,:ID_type_habitation,:numero_habitation,:rue,:code_postal,:pays,:ID_confidentialite,:ID_gestionnaire)');
            $requete->execute(array(
                'ID' => NULL,
                'ID_utilisateur_principal' => $ID_utilisateur_principal,
                'nom' => $_POST['nom'],
                'nombre_pieces' => 0,
                'superficie' => $_POST['size'],
                'ID_type_habitation' => 1,
                'numero_habitation' => $_POST['num'],
                'rue' => $_POST['rue'],
                'code_postal' => $_POST['post'],
                'pays' => $_POST['pays'],
                'ID_confidentialite' => 1,
                'ID_gestionnaire' => 0,
            ));
            $ID = $bdd->query("SELECT ID FROM domicile ORDER BY ID DESC LIMIT 1");
            $ID_dom = $ID->fetch();
            $ID_domicile = $ID_dom['ID'];

            $sql = "UPDATE utilisateur SET ID_domicile=$ID_domicile WHERE ID=:ID";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array(
                'ID' => $ID_utilisateur_principal));
        }
        else{
            $sql = "UPDATE domicile SET nom'=".$_POST['nom'].", superficie = ".$_POST['size'].", numero_habitation =". $_POST['num'].", code_postal = ".$_POST['post'].",pays = ".$_POST['pays']." WHERE ID=:ID";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array(
                'ID' => $ID_domicile
            ));

        }


    }
}




function Supprimer_domicile($ID_domicile)
{
    global $bdd;
    $req = $bdd->exec('DELETE FROM domicile WHERE ID="' . $ID_domicile . '" ');



}





function Ajouter_piece($ID_domicile){
    global $bdd;
    if(isset($_POST['ajoutpiece'])){
        if(!empty($_POST['piece'])) {

            $requete = $bdd->prepare('INSERT INTO piece(ID,ID_domicile,nom,nombre_capteurs)
                 VALUES (:ID,:ID_domicile,:nom,:nombre_capteurs)');
            $requete->execute(array(
                'ID' => NULL,
                'ID_domicile' => $ID_domicile,
                'nom' => $_POST['piece'],
                'nombre_capteurs' => 0,

            ));

        }};

}





function Afficher_piece($ID_domicile)
{
    global $bdd;
    $piece_ajoutées = $bdd->query("SELECT ID, nom FROM piece WHERE ID_domicile=$ID_domicile ORDER BY ID");
    return $piece_ajoutées;
    $piece->closeCursor();
}







function Supprimer_piece($ID_domicile)
{
    global $bdd;
    if(isset($_POST['accepter'])) {
        $nom_piece= $_POST['nom_piece'];

        $req = $bdd->exec('DELETE FROM piece WHERE nom="'.$nom_piece.'"AND  ID_domicile="'.$ID_domicile.'"  ' );

        //));

    }
}




function Afficher_cemac($ID_domicile)
{
    global $bdd;
    $cemac = $bdd->query("SELECT cemac.nom,cemac.ID FROM cemac JOIN piece ON cemac.ID_piece = piece.ID WHERE piece.ID_domicile= $ID_domicile ");
    return $cemac;
    $cemac->closeCursor();
}





function Ajouter_cemac()
{
    global $bdd;
    if(isset($_POST['addc'])){
        if(!empty($_POST['numero']) AND $_POST['piece']!='NULL' ) {

            $requete = $bdd ->prepare('INSERT INTO cemac( ID ,ID_piece ,nom, port )
                              VALUES ( :ID , :ID_piece , :nom , :port )');
            $requete ->execute(array(
                'ID' =>NULL,
                'ID_piece' => $_POST['piece'],
                'nom' => $_POST['numero'],
                'port' => 10,


            ));
        }
    }
}


function Supprimer_cemac()
{
    global $bdd;

        $ID_cem= $_POST['ID_cem'];
        $req = $bdd->exec('DELETE FROM cemac WHERE ID="'.$ID_cem.'"  ' );

        //));


}







function Afficher_type_capteur()
{
    global $bdd;
    $reponse_capteur = $bdd->query("SELECT nom_type,ID FROM type_equipement ORDER BY ID");
    return $reponse_capteur;
    $reponse_capteur->closeCursor();
}








function Ajouter_capteur()
{
    global $bdd;
    if(isset($_POST['add'])){
        if(!empty($_POST['nom'] AND $_POST['piece']!='NULL' AND $_POST['type_capteur']!='NULL' )) {

            $requete = $bdd ->prepare('INSERT INTO equipement( ID ,ID_piece ,nom, ID_type_equipement )
                              VALUES ( :ID , :ID_piece , :nom , :ID_type_equipement )');
            $requete ->execute(array(
                'ID' =>NULL,
                'ID_piece' => $_POST['piece'],
                'nom' => $_POST['nom'],
                'ID_type_equipement' => $_POST['type_capteur'],


            ));
        }
    }
}






function Afficher_capteur($ID_domicile)
{
    global $bdd;
    $capt = $bdd->query("SELECT equipement.nom,equipement.ID FROM equipement JOIN piece ON equipement.ID_piece = piece.ID WHERE piece.ID_domicile=$ID_domicile  ");
    return $capt;
    $capt->closeCursor();
}





function Supprimer_capteur()
{
    global $bdd;
    if(isset($_POST['dell'])) {

        $ID_cap= $_POST['ID_capt'];
        $req = $bdd->exec('DELETE FROM equipement WHERE ID="'.$ID_cap.'"  ' );


    }
}





function Afficher_email()
{
    global $bdd;
    $recherche=' ';
    $reponse_ajout = $bdd->query("SELECT email FROM utilisateur WHERE nom='".$recherche."' AND ID_domicile=0 ");
    if(isset($_POST['recherche'])){
        if(!empty(isset($_POST['nom']))) {
            $recherche = $_POST['nom'];
            $reponse_ajout = $bdd->query("SELECT email FROM utilisateur WHERE nom='".$recherche."' AND ID_domicile=0  ");
        }
    }

    return $reponse_ajout;
    //header('Location:../index.php#user');

    $reponse_ajout->closeCursor();
}








function Ajouter_utilisateur($ID_domicile,$ID_utilisateur_principal)
{
    global $bdd;
    $mail='';
    if(isset($_POST['Valider'])) {
        $mail= $_POST['user'];
        $sql = "UPDATE utilisateur SET ID_domicile=$ID_domicile,ID_type_utilisateur=1 WHERE email=:email AND ID!=$ID_utilisateur_principal";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array(
        'email' => $mail
    ));

}
}







function Afficher_utilisateur($ID_domicile)
{
    global $bdd;
    $reponse_ajout = $bdd->query("SELECT prenom,ID FROM utilisateur WHERE ID_domicile=$ID_domicile AND ID_domicile>0  ");
    return $reponse_ajout;
    $reponse_ajout->closeCursor();
}






function Supprimer_utilisateur($ID_utilisateur_principal)
{
    global $bdd;
    if (isset($_POST['Supp'])) {
        $member = $_POST['member'];
        $sql = "UPDATE utilisateur SET ID_domicile=0 WHERE ID=:ID AND ID!=$ID_utilisateur_principal";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array(
            'ID' => $member
        ));

    }
}




function Ajouter_utilisateur_principal()
{
    global $bdd;
    if(isset($_POST['admin'])) {
        $member= $_POST['princip'];
        $sql = "UPDATE utilisateur SET  	ID_type_utilisateur=2 WHERE ID=:ID";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array(
            'ID' => $member
        ));

    }
}


function Supprimer_utilisateur_principal()
{
    global $bdd;
    if(isset($_POST['SuppAdmin'])) {
        $member= $_POST['noprincip'];
        $sql = "UPDATE utilisateur SET  ID_type_utilisateur=1 WHERE ID=:ID";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array(
            'ID' => $member
        ));

    }
}


function Afficher_utilisateur_principal($ID_domicile)
{
    global $bdd;
    $reponse_utilisateurs = $bdd->query("SELECT ID,prenom FROM utilisateur WHERE ID_domicile=$ID_domicile AND ID_type_utilisateur=2 AND ID_domicile>0 ORDER BY ID");
    return $reponse_utilisateurs;
    $reponse_utilisateurs->closeCursor();
}