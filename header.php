<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Menu domisep</title>
</head>
<body>
<header>
  <nav>
    <div class="navbar">
      <a href="#home">Accueil</a>
      <a href="#news">Mon Domicile</a>
      <a href="#contact">Paramètres</a>
      <a href="#contact">Support</a>
    </div>
  </nav>
</header>

<style media="screen">
* {
  font-family: 'Comfortaa',sans-serif;
  text-decoration: none;
  color:#343434;

}
html{
  background: white;
  margin:0;
  padding:0;
  height:100%;
  position: relative;
  min-height: 100%;
}
header {
  position: absolute;
  top:0;
  left:0;
  z-index: 999;
  width:100%;
}
body {
  position: relative;
  margin:0;
  overflow-x: hidden;
  height:1000px;
}
div.navbar {
  overflow: hidden;
  //background-color: #4650E2;
  background:linear-gradient(-90deg, #4650E2, #00A2E8);
  position: static;
  top: 0;
  width: 100%;
  padding-top: 3rem;
  text-align: center;
  box-shadow: 0px 2px 2px 0px #BEBEBE;
  z-index: 2;
}

div.navbar a {
  display: inline-block;
  color: #F2F2F2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px
}

div.navbar a:hover {
  background: #1111;
  //font-size:150%;
  color: black;
}

</style>
