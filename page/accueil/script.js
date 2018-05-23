/*
var acc = document.getElementsByClassName("accordion");
//var cont = document.getElementById("topContainer");
var i;

for (i = 0; i < acc.length; i++) {
acc[i].addEventListener("click", function () {
this.classList.toggle("active");
var panel = this.nextElementSibling;
if (panel.style.maxHeight) {
panel.style.maxHeight = null;
//cont.style.maxHeight = null;
} else {
panel.style.maxHeight = panel.scrollHeight + "px";
//  cont.style.maxHeight = panel.scrollHeight + "px";
}
});
}*/

var $rows = $('#table tr');
$('#search').keyup(function() {
  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

  $rows.show().filter(function() {
      var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
      return !~text.indexOf(val);
  }).hide();
});
