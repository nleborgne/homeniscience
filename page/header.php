<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

  body {
    margin: 0;
    font-family: 'Lato', Helvetica, sans-serif;
    background-image: url("../image/fond_bleu.jpg");
    background-size: auto;
    background-attachment :fixed;
  }

  .topnav {
    overflow: hidden;
    text-align: right;
    background:linear-gradient(-90deg, #4650E2, #00A2E8);
    margin-bottom: 50px;
  }
  button {
    cursor:pointer;
  }
  .topnav a {
    display: inline-block;
    color: #f2f2f2;
    text-align: center;
    padding: 16px 18px;
    text-decoration: none;
    font-size: 17px;
  }
  .topnav .img_default {
    display: inline-block;
    float: left;
    margin-left: 200px;
  }
  .topnav .text_default {
    display: inline-block;
    float:left;
    color: white;
  }
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }

  .active {
    background-color: #343434;
    color: white;
  }

  .topnav .icon {
    display: none;
  }

  @media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {display: none;}
    .topnav a.icon {
      float: right;
      display: block;
    }
    .topnav .invisible {display: none;}

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
  }
</style>
</head>
<body>

  <div class="topnav" id="myTopnav">
    <img class="img_default" id="img" src="/homeniscience/page/support/header_logo.png" alt="">
    <p id="text" class="text_default">Homeniscience</p>
    <a id="accueil" href="/homeniscience/page/accueil/index.php">Accueil</a>
    <a id="domicile" href="/homeniscience/page/domicile/">Mon Domicile</a>
    <a id="residence" href="/homeniscience/page/gestionnaire">Résidence</a>
    <a id="support" href="/homeniscience/page/support">Support</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

  </div>


  <script>

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
  function myFunction() {
    var x = document.getElementById("myTopnav");
    var y = document.getElementById("img");
    var z = document.getElementById("text");
    if (x.className === "topnav") {
      x.className += " responsive";
      y.className += " invisible";
      z.className = "invisible";
    } else {
      x.className = "topnav";
      y.className = "img_default";
      z.className = "text_default";
    }
  }
</script>

</body>
</html>
