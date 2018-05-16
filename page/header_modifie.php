<?php
if(!isset($_SESSION)){
  session_start();
}
try {
  $bdd = new PDO('mysql:host=localhost;dbname=homeniscience;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}
function getNom() {
  global $bdd;
  $get = $bdd->prepare('SELECT prenom, nom FROM utilisateur WHERE ID = ?');
  $get->execute(array($_SESSION['ID']));
  return $get;
}
$name = getNom()->fetch();?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  body {margin:0;font-family:'Lato';}

  .topnav {
    overflow: hidden;
    background:linear-gradient(-90deg, #4650E2, #00A2E8);
  }

  .topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .active {
    background-color: #343434;
    color: white;
  }

  .topnav .icon {
    display: none;
  }

  .dropdown {
    float: left;
    overflow: hidden;
  }

  .dropdown .dropbtn {
    font-size: 17px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }

  .topnav a:hover, .dropdown:hover .dropbtn {
    background-color: #696969;
    color: white;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
    color: black;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  @media screen and (max-width: 600px) {
    .topnav a:not(:first-child), .dropdown .dropbtn {
      display: none;
    }
    .topnav a.icon {
      float: right;
      display: block;
    }
  }

  @media screen and (max-width: 600px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive .icon {
      position: absolute;
      right: 0;
      top: 0;
    }
    .topnav.responsive a {
      float: none;
      display: block;
      text-align: left;
    }
    .topnav.responsive .dropdown {float: none;}
    .topnav.responsive .dropdown-content {position: relative;}
    .topnav.responsive .dropdown .dropbtn {
      display: block;
      width: 100%;
      text-align: left;
    }
  }
</style>
</head>
<body>

  <div class="topnav" id="myTopnav">
    <a id="accueil" href="/homeniscience/page/accueil/index.php">Accueil</a>
    <a id="domicile" href="/homeniscience/page/domicile/">Mon Domicile</a>
    <a id="residence" href="/homeniscience/page/gestionnaire">Résidence</a>
    <div class="dropdown">
      <button class="dropbtn"><?php echo $name['prenom'].' '.$name['nom']; ?>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="#">Paramètres</a>
        <a href="#">Se déconnecter</a>
      </div>
    </div>
    <a id="support" href="/homeniscience/page/support">Support</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>

  <script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

  var page = window.location.href;
  if (page.includes("accueil")) {
    document.getElementById('accueil').className += "active";
  } else if (page.includes("domicile")) {
    document.getElementById('domicile').className += "active";
  } else if (page.includes("gestionnaire")) {
    document.getElementById('residence').className += "active";
  } else if (page.includes("support")) {
    document.getElementById('support').className += "active";
  }
</script>

</body>
</html>
