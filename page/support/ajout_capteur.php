<?php
if(!isset($_SESSION)){
  session_start();
}
try {
  $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}

function getCapteurs() {
  global $bdd;
  $get = $bdd->prepare('SELECT *,
    equipement.nom AS nom_equipement,
    equipement.ID AS ID_equipement
    FROM equipement
    INNER JOIN piece ON equipement.ID_piece = piece.ID
    INNER JOIN domicile ON piece.ID_domicile = domicile.ID
    INNER JOIN utilisateur ON domicile.ID_utilisateur_principal = utilisateur.ID
    WHERE utilisateur.ID = ?');
    $get->execute(array(2));
    return $get;
  }

  if (!empty($_POST['ID_equipement']) && !empty($_POST['descriptif_panne'])) {
    $insert = $bdd->prepare('INSERT INTO panne (ID_equipement,ID_type_statut,date_panne,date_intervention,descriptif_panne) VALUES (:ID_equipement,:ID_type_statut,:date_panne,:date_intervention,:descriptif_panne)');
    $insert->execute(array(
      'ID_equipement' => $_POST['ID_equipement'],
      'ID_type_statut' => 0,
      'date_panne' => date("Y-m-d"),
      'date_intervention' => '0001-01-01',
      'descriptif_panne' => $_POST['descriptif_panne']
    ));
    echo '<script>
    window.onunload = refreshParent;
    function refreshParent() {
      window.opener.location.reload();
    }
    </script>';
    echo '<script>window.close()</script>';
  }
  ?>


  <!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <title>Ajouter une panne</title>
  </head>
  <body>
    <h3>Ajouter une panne</h3>
    <form class="ajouter_panne" action="ajout_capteur.php" method="post">
      <p>Équipement : </p>
      <?php $capteurs = getCapteurs();
      ?>
      <select class="" name="ID_equipement">
        <?php
        while ($donnees = $capteurs->fetch()) {
          echo '<option value="'.$donnees['ID_equipement'].'">'.$donnees['nom_equipement'].'</option>';
        }
        ?>
      </select> <br>
      <p>Descriptif : </p>
      <input type="text" name="descriptif_panne" value=""> <br>
      <div style="text-align:center;">
        <input type="submit" name="" value="Valider">
      </div>
    </form>
  </body>
  </html>

  <style media="screen">
  h3 {
    font-family: 'Roboto', 'sans-serif';
    text-align:center;
  }
  p,input {
    font-family: 'Lato', 'sans-serif';
    display:inline-block;
  }
  input[type=text],select,input[type=date] {
    font-family:'Lato';
    border-radius: 3px;
    border:1px solid grey;
  }
  input[type=submit] {
    margin : 0 auto;
    border-radius : 5px;
    background-color: #0099ff;
    color:white;
    padding:10px;
    font-size:12px;
    border:none;
    cursor:pointer;
  }
  input[type=submit]:hover {
    background-color: #4353E2;
  }
</style>
