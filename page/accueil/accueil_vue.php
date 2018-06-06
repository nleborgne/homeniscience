<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Accueil</title>
  <link rel="stylesheet" href="accueil.css">
</head
<?php require('../header.php'); ?>
<body>
  <h1 class="title">Bonjour <?php echo $name['prenom'].' '.$name['nom'];?></h1>

  <!-- Affichage dynamique des pièces et capteurs avec barre de recherche-->
  <div class="container">



    <div class="flex2">
      <button class="accordion" type="button" name="button" style="color:white;  background:(-90deg, #4650E2, #00A2E8)">Domicile</button>
        <input class="search" id="search" name="search" placeholder="Rechercher..." type="text" autocomplete="off">

      <div class="panel">

        <?php include('vue_domicile.php'); ?>
      </div>
    </div>
  </div>

  <!-- Affichage statique de l'historique -->
  <div id="topContainer" class="container">

      <div class="flex1">
          <button class="accordion" type="button" name="button" style="color:white;  background: #00A2E8">Statistiques</button>
          <div class="panel">
              <img class="graph" src="graph.png" alt="">
          </div>
      </div>
    <div class="flex1">
      <button class="accordion" type="button" name="button" style="color:white ;  background: #00A2E8">Général</button>
      <div class="panel">
          <form action="index.php" method="post">
          <input type="text" class="message" id="superficie" name="msg_forum" placeholder="entrez un message"  style="width: 280px;  margin: 5px" >
         <input class="boutton" type="submit" name="ajouter" value="valider" >
          </form>
          <div style="padding:20px"
          <?php  while ($message=$messageforum->fetch()){
              ?>
              <p><?php echo '<strong>', $message['prenom'],'</strong>',' ','le ',$message['date'],':   ',$message['contenu'] ?> </p>
          <?php } ?>

      </div>
      </div>
    </div>


      <div class="flex1">

      <button class="accordion" type="button" name="button" style="color:white;  background: #00A2E8">Sécurité</button>
      <div class="panel">
        <br><br>
          <p>Alarme:</p>
          <form method="post" action="index.php" style="font-size: 40px">
           <br>

          <input type="text" class="clock" id="clock" name="alarm_h" placeholder="Heure" Value="08"  style="width: 120px; max-height: 60px; font-size: 40px;  margin: 5px" >:
          <input type="text" class="clock" id="clock" name="alarm_min" placeholder="Min" Value="30"  style="width: 120px; max-height: 60px; font-size: 40px;  margin: 5px" >
        <label class="switch">
          <input type="checkbox">
          <span class="slider round"></span>
          </form>
        </label>

      </div>
    </div>
    <div class="flex1">
      <button class="accordion" type="button" name="button" style="color:white ;  background: #00A2E8">Infos</button>
      <div class="panel">
        <?php ?>





          <link rel="stylesheet" type="text/css" href="clock_style.css">
          <script type="text/javascript">
              window.onload = setInterval(clock,1000);

              function clock()
              {
                  var d = new Date();

                  var date = d.getDate();

                  var month = d.getMonth();
                  var montharr =["Jan","Fev","Mar","Avril","Mai","Juin","Juillet","Aout","Sep","Oct","Nov","Dec"];
                  month=montharr[month];

                  var year = d.getFullYear();

                  var day = d.getDay();
                  var dayarr =["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"];
                  day=dayarr[day];

                  var hour =d.getHours();
                  var min = d.getMinutes();
                  var sec = d.getSeconds();

                  document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
                  document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
              }
          </script>
          </head>

          <article classe="clock">

          <p id="date"></p>
          <p id="time"></p>

          </article>




      </div>
    </div>


      <div class="flex1">
          <button class="accordion" type="button" name="button" style="color:white; background: #00A2E8;">Historique</button>
          <div class="panel">
              
          </div>
      </div>

  </div>
  <footer style="position: inherit">
      <?php require ('../footer.php')?>
  </footer>
  <script src="script.js"></script>

</body>

</html>
