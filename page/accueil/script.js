// Barre de recherche
var $rows = $('#table tr');

$('#search').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

  $rows.show().filter(function() {
      var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
      return !~text.indexOf(val);
  }).hide();
});

// AJAX
$("#moteursliderallumer").click(function () {

    //on allume le moteur
    $.ajax({
        url: 'http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009C&TRAME=1009C13021111' // La ressource ciblée
    });
});

$("#moteurslidereteint").click(function () {

    // on eteint le moteur
    $.ajax({
        url: 'http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009C&TRAME=1009C13020000' // La ressource ciblée
    });
});

$("#light").click(function () {
    valueLight = document.getElementById("light").value *30;
    //on allume la lampe
    $.ajax({
        url: 'http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009C&TRAME=1009C1305'+valueLight // La ressource ciblée
    });
});

function executeQuery() {
    $.ajax({
        url: '../../trames/trames_traitement.php',
        success: function(data) {
            $('#table').load(document.URL+" #table");
            // do something with the return value here if you like
        }
    });
    setTimeout(executeQuery, 1000); // you could choose not to continue on failure...
}

// run the first time; all subsequent calls will take care of themselves
setTimeout(executeQuery, 1000);