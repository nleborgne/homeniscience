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
            <a id="accueil_foot" href="../accueil"><img class="logo_foot" src="/homeniscience/page/img/logoHomniscience.png" alt="Homeniscience" title="Accueil" BackColor="transparent"/></a>
        </div>
        <div id="elementdroite">
            <div id="elementdessus">
                <div id="contact">
                    <h2 class="foot_titre">Contact</h2>
                    <p><i class="fas fa-phone-square foot_small"><span class="foot_para">    +33 1 23 45 67 89</span></i></p>
                    <p><i class="fas fa-at foot_small"><span class="foot_para">    dom@isep.fr</span></i></p>
                    <p><i class="fas fa-map-marker foot_small"><span class="foot_para">    Rue notre Dame des champs</span></i></p>
                </div>
                <div id="reseau">
                    <h2 class="foot_titre">Réseaux sociaux</h2>
                    <i class="fab fa-facebook-square foot_fb" title="facbook"></i>
                    <i class="fab fa-twitter-square foot_tw" title="twitter"></i>
                    <i class="fab fa-linkedin foot_in" title="linkedin"></i>
                    <i class="fab fa-google-plus-square foot_gg" title="google"></i>
                </div>
                <div id="about">
                    <h2 class="foot_titre">A propos d'Hexateam</h2>
                    <a id="hexateam_foot" href="Hexateam"><img class="logo_Hexateam" src="/homeniscience/page/img/logoHexateam.png" alt="Hexateam" title="Hexateam"></a>
                </div>
            </div>
            <div id="elementdessous">
                <a id="foot_emailing" href="/homeniscience/page_contact/controler_contact.php">E-mailing</a>
                <a id="foot_legale" href="/homeniscience/Doc-administratif/Mentions-legales.php">Mentions légales</a>
                <a id="foot_CGU" href="/homeniscience/Doc-administratif/CGU.php">CGU</a>
                <a id="foot_rgpd" href="/homeniscience/Doc-administratif/RGPD.php">RGPD</a>
                <span class="copyright">Copyright © 2018 | Domisep.fr</span>
            </div>
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
    position: sticky;
    bottom: 0;
    height: 190px;
    width:100%;
    background:linear-gradient(-90deg, #4650E2, #00A2E8);
}
#elementgauche
{
    float: left;
    width: 25%;
}
#elementdroite
{
    float: left;
    width: 65%;
}
#elementdessus
{
    display: flex;
    justify-content: space-between;
}
#elementdessous
{
    display: flex;
    justify-content: space-between;
    border-top: solid 1px #f2f2f2;
}
#contact, #reseau, #about
{

    padding: 0px 10px 0px 10px;
}
h2
{
    font-size: 18px;
}
.foot_fb,.foot_in,.foot_gg,.foot_tw
{
    display: inline;
    color:#f2f2f2;
    font-size: 45px;
    margin-top: 10px;
    margin-right: 10px;
    text-decoration: none;
}
.foot_fb:hover
{
    transition: all 0.3s ease;
    color: #3b5998;
    cursor: pointer;
}
.foot_tw:hover
{
    transition: all 0.3s ease;
    color: #33CCFF;
    cursor: pointer;
}
.foot_in:hover
{
    transition: all 0.3s ease;
    color: black;
    cursor: pointer;
}
.foot_gg:hover
{
    transition: all 0.3s ease;
    color: #EA4335;
    cursor: pointer;
}
.foot_small
{
    font-size: 13px;
    display: inline;
}
.foot_para
{
    font-size: 13px;
}
#foot_CGU, #foot_legale, #foot_emailing, .copyright, #foot_rgpd
{
    font-size: 10px;
    font-weight: bold;
    color:#f2f2f2;
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
@media screen and (max-width: 900px) {
    #elementgauche{
        display: block;
    }
    #elementdroite{
        display: flex;
        flex-direction: column;
    }
}

</style>
