<?php
if(!isset($_SESSION)){
  session_start();
}

/* Fonction permettant d'afficher les différentes pannes */
function afficherPannes() {
  global $bdd;
  /* Explication de la requete MySQL :
  On selectionne d'abord la table panne , et on effectue des jointures internes pour récupérer les informations des autres tables dont on a besoin
  Certaines colonnes ont le même nom dans différentes tables, on donne donc des alias pour les différencier
  */
  $reponse = $bdd->prepare('SELECT *,
    equipement.nom AS nom_equipement,
    utilisateur.nom AS nom_utilisateur
    FROM panne
    INNER JOIN type_statut ON panne.ID_type_statut = type_statut.ID
    INNER JOIN equipement ON panne.ID_equipement = equipement.ID
    INNER JOIN piece ON equipement.ID_piece = piece.ID
    INNER JOIN domicile ON piece.ID_domicile = domicile.ID
    INNER JOIN utilisateur on domicile.ID_utilisateur_principal = utilisateur.ID
    WHERE utilisateur.ID = ?');
    $reponse->execute(array($_SESSION['ID']));
    return $reponse;
  }

  /* Fonction permettant d'afficher les détails d'une panne (bandeau du bas de la page pannes) */
  function afficherDetails() {
    global $bdd;

    $reponse = $bdd->prepare('SELECT *,
      panne.ID AS panne_ID
      FROM panne
      INNER JOIN type_statut
      ON panne.ID_type_statut = type_statut.ID
      WHERE panne.ID = ?');
      $reponse->execute(array($_GET['id']));
      return $reponse;
    }

    function afficherTypes() {
      global $bdd;

      $reponse = $bdd->query('SELECT * FROM type_statut');
      return $reponse;
    }

    function miseAJour() {
      global $bdd;

      $reponse = $bdd->prepare('UPDATE panne SET date_panne = :date_panne, date_intervention = :date_intervention, descriptif_panne = :descriptif_panne, ID_type_statut = :ID_type_statut WHERE ID = :ID');
      $reponse->execute(array(
        'ID' => $_POST['ID'],
        'date_panne' => $_POST['date_panne'],
        'date_intervention' => $_POST['date_intervention'],
        'descriptif_panne' => $_POST['descriptif'],
        'ID_type_statut' => $_POST['ID_statut']
      ));
    }

    function getCapteurs() {
      global $bdd;
      $get = $bdd->prepare('SELECT *,
        equipement.nom AS nom_equipement,
        piece.nom AS nom_piece,
        equipement.ID AS ID_equipement
        FROM equipement
        INNER JOIN piece ON equipement.ID_piece = piece.ID
        INNER JOIN domicile ON piece.ID_domicile = domicile.ID
        INNER JOIN utilisateur ON domicile.ID_utilisateur_principal = utilisateur.ID
        WHERE utilisateur.ID = ?');
        $get->execute(array($_SESSION['ID']));
        return $get;
      }

      function insererPanne() {
        global $bdd;
        $insert = $bdd->prepare('INSERT INTO panne (ID_equipement,ID_type_statut,date_panne,date_intervention,descriptif_panne) VALUES (:ID_equipement,:ID_type_statut,:date_panne,:date_intervention,:descriptif_panne)');
        $insert->execute(array(
          'ID_equipement' => $_POST['ID_equipement'],
          'ID_type_statut' => 0,
          'date_panne' => date("Y-m-d"),
          'date_intervention' => '0001-01-01',
          'descriptif_panne' => $_POST['descriptif_panne']
        ));
        header('Refresh:0');
      }

      ?>
