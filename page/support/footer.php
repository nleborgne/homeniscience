<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Footer</title>
</head>
<footer>
    <nav>
        <div id="elementgauche">
        <a id="support" href="page/support.html" title="Nous contacter">Support</a>
        <a id="about" href="About" title="Hexateam">À Propos</a>
        </div>
        <a id="accueil" href="page/acceuil.html"><img src="/homeniscience/logoHomniscience.png" alt="Homniscience" title="Accueil" BackColor="transparent"/></a>
        <div id="elementdroit">
        <a id="CGU" href="CGU" title="Conditions générales d'utilisation">CGU</a>
        <a id="legale" href="MentionLegale" title="Mentions légales">Mentions Légales</a>
        </div>
    </nav>
</footer>

<style media="screen">
* {
    font-family: 'Comfortaa',sans-serif;
    text-decoration: none;
    color:#343434;
    box-sizing: border-box;
}
footer {
  position: relative;
}
nav{
    position: absolute;
    display: flex;
    justify-content: space-evenly;
    right: 0;
    bottom: 0;
    left: 0;
    height: 130px;
    width:100%;
    background-image: radial-gradient(circle at top center, #60C5F1, #00A2E8);
    padding-top: 20px;
}
#elementgauche, #elementdroit
{
    display: flex;
    flex-direction: column;
}
img
{
    display: block;
    margin-left: auto;
    margin-right: auto;
    height: 120px;
    width: 120px;
    padding: 10px 10px 10px 10px;

}
img:hover
{
    transition: all 0.3s ease;
    transform: scale(1.15);
}
#support, #about, #CGU, #legale
{
    text-align: center;
    padding: 15px 30px 15px 30px;
    background-color: rgba(30,119,243,0.2);
    border-radius: 5px;
    margin: 5px 5px 5px 5px;
}
#support:hover, #about:hover, #CGU:hover, #legale:hover
{
    background-color: rgba(105,105,105,0.3);
    color: #CECECE;
    font-weight: bold;
    transition: all 0.3s ease;
    transform: scale(1.1);
}
</style>
