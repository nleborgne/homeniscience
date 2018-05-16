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
            <a id="accueil_foot" href="../accueil"><img class="logo_foot" src="/homeniscience/page/img/logoHomniscience.png" alt="Homeniscience" title="Accueil" BackColor="transparent"/></a>
            <div id="contact">
                <h2 class="foot_titre">Contact</h2>
                <p><i class="fas fa-phone-square small"><span class="foot_para">    +33 1 23 45 67 89</span></i></p>
                <p><i class="fas fa-at small"><span class="foot_para">    dom@isep.fr</span></i></p>
                <p><i class="fas fa-map-marker small"><span class="foot_para">    Rue notre Dame des champs</span></i></p>
            </div>
            <div id="reseau">
                <h2 class="foot_titre">Réseaux sociaux</h2>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-google-plus-square"></i>
            </div>
            <div id="about">
                <h2 class="foot_titre">A propos d'Hexateam</h2>
                <a id="hexateam_foot" href="Hexateam"><img class="logo_Hexateam" src="/homeniscience/page/img/logoHexateam.png" alt="Hexateam" title="Hexateam"></a>
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
    color:#f2f2f2;
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
    border-bottom: solid #f2f2f2 1px;
}
#about
{
    padding: 0px 100px 0px 160px;
    border-bottom: solid #f2f2f2 1px;
}
h2
{
    font-size: 18px;
}
i
{
    display: inline;
    color:#f2f2f2;
    font-size: 45px;
    margin-top: 10px;
    margin-right: 10px;
}
.small
{
    font-size: 13px;
    display: inline;
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
    color:#f2f2f2;
    margin: 0px 30px 0px 270px;
}
#foot_CGU, #foot_legale
{
    font-size: 10px;
    font-weight: bold;
    color:#f2f2f2;
    margin: 0px 30px 0px 30px;
}
.copyright
{
    font-size: 10px;
    font-weight: bold;
    color:#f2f2f2;
    margin: 0px 30px 0px 720px;
}
.logo_foot
{
    display: block;
    margin: 20px 75px 0px 75px;
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
.logo_Hexateam
{
    height: 80px;
    width: 70px;
    margin-left: 10px;
}

</style>
