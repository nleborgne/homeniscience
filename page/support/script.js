var a = document.getElementsByClassName('statut');
for (var i = 0; i < a.length; i++) {
  if(a[i].innerHTML == "en attente") {
    a[i].className += " orange";
  }
  if(a[i].innerHTML == "terminé") {
    a[i].className += " green";
  }
}
