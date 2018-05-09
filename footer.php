<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto|Lato" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Footer</title>
</head>
<footer>
    <nav class="nav_foot">
        <div id="elementgauche">
        <a id="support_foot" href="page/support.html" title="Nous contacter">Support</a>
        <a id="about_foot" href="About" title="Hexateam">À Propos</a>
        </div>
        <a id="accueil_foot" href="page/acceuil.html"><img class="logo_foot" src="../logoHomniscience.png" alt="Homeniscience" title="Accueil" BackColor="transparent"/></a>
        <div id="elementdroit">
        <a id="CGU_foot" href="CGU" title="Conditions générales d'utilisation">CGU</a>
        <a id="legale_foot" href="MentionLegale" title="Mentions légales">Mentions Légales</a>
        </div>
    </nav>
</footer>

<style media="screen">
* {
    font-family: 'Roboto',sans-serif;
    text-decoration: none;
    color:#343434;
}

.nav_foot
{
    position: static;
    display: flex;
    justify-content: space-evenly;
    bottom: 0;
    height: 130px;
    width:100%;
    background-image: radial-gradient(circle at top center, #60C5F1, #00A2E8);
}
#elementgauche, #elementdroit
{
    display: flex;
    flex-direction: column;
}
.logo_foot
{
    display: block;
    margin-left: auto;
    margin-right: auto;
    height: 120px;
    width: 120px;
    padding: 15px 10px 0px 10px;

}
.logo_foot:hover
{
    transition: all 0.5s ease;
    transform: scale(1.15);
}
#support_foot, #about_foot, #CGU_foot, #legale_foot
{
    text-align: center;
    padding: 25px 30px 20.5px 30px;


}
#support_foot:hover, #about_foot:hover, #CGU_foot:hover, #legale_foot:hover
{
    background-color: rgb(105,105,105);
    color: #CECECE;
    font-weight: bold;
    transition: all 0.3s ease;

}
</style>

