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
        <div id="elementdessus">
            <a id="accueil_foot" href="page/acceuil.html"><img class="logo_foot" src="/homeniscience/page/img/logoHomniscience.png" alt="Homeniscience" title="Accueil" BackColor="transparent"/></a>
            <div id="contact">
                <h2 class="foot_titre">Contact</h2>
                <p class="foot_para">+33 1 23 45 67 89</p>
                <p class="foot_para">dom@isep.fr</p>
                <p class="foot_para">Rue notre Dame des champs</p>
            </div>
            <div id="reseau">
                <h2 class="foot_titre">Réseaux sociaux</h2>
                <!-- Insérer des icones de réseaux sociaux -->
            </div>
            <div id="about">
                <h2 class="foot_titre">A propos d'Hexateam</h2>
            </div>
        </div>
        <div id="elementdessous">
            <a id="foot_emailing" href="la page de l'email">E-mailing</a>
            <a id="foot_legale" href="MentionsLegales">Mentions légales</a>
            <a id="foot_CGU" href="CGU">CGU</a>
            <p class="copyright">Copyright © 2018 | Domisep.fr</p>
        </div>
    </nav>
</footer>

<style media="screen">

footer {
    font-family: 'Roboto',sans-serif;
    text-decoration: none;
    color:#343434;
}
.nav_foot
{
    position: static;
    display: flex;
    flex-direction: column;
    bottom: 0;
    height: 160px;
    width:100%;
    background:linear-gradient(-90deg, #4650E2, #00A2E8);
}
#elementdessus
{
    display: flex;
}
#contact, #reseau
{
    padding: 0px 10px 0px 150px;
    border-bottom: solid #343434 1px;
}
#about
{
    padding: 0px 190px 0px 160px;
    border-bottom: solid #343434 1px;
}
h2
{
    font-size: 18px;
}
.foot_para
{
    font-size: 13px;
}
#elementdessous
{
    display: flex;
    justify-content: flex-start;
}
#foot_emailing
{
    font-size: 10px;
    font-weight: bold;
    color:#343434;
    margin: 0px 30px 0px 270px;
}
#foot_CGU, #foot_legale
{
    font-size: 10px;
    font-weight: bold;
    color:#343434;
    margin: 0px 30px 0px 30px;
}
.copyright
{
    font-size: 10px;
    font-weight: bold;
    color:#343434;
    margin: 0px 30px 0px 720px;
}
.logo_foot
{
    display: block;
    margin: 20px 50px 0px 100px;
    border-bottom: solid #343434 1px;
    height: 120px;
    width: 120px;
    padding: 10px 10px 10px 10px;
    border-radius: 70px;
    background: rgba(255,255,255,0.4);

}
.logo_foot:hover
{
    transition: all 0.5s ease;
    transform: scale(1.1);
}

</style>
