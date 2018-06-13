<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../page_contact/vue_contact.css"/>
    <title>Contact</title>
</head>

<header>
    <?php require ('../page/header.php') ; //appel du header ?>
</header>

<body>
<div id="conteneur">
    <h1>Bienvenue sur la page de contact</h1>

    <p>
        Bonjour <!-- salutation-->
        <?php echo htmlspecialchars($_SESSION["prenom"]) . ' ' . htmlspecialchars($_SESSION["nom"]) . ',' ?>
    </p>
    <p>
        Cette page est faite pour vous exprimer et nous envoyer des mails.<br />
    </p>
    <p>
        N'hésitez pas à nous poser <strong>toutes vos questions</strong> et l'un de nos collaborateurs vous enverra un mail aussi vite que possible !
    </p>

    <form enctype="text/plain" method="get" action="mailto:test@test.fr" id="contact">
        <fieldset>
            <legend>Contactez-nous !</legend>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Quel est l'objet ?</label>
                </div>
                <div class="col-75">
                    <input type="text" id="subject" name="subject" placeholder="Votre objet" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="message">Quelle question souhaitez-vous nous poser ?</label>
                </div>
                <div class="col-75">
                    <textarea form="contact" id="message" name="message" placeholder="Votre message" rows="10" cols="50" required></textarea>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <input type="submit" value="Envoyer">
        </div>
    </form>
</div>

<footer>
    <?php require ('../page/footer.php'); //appel du footer ?>
</footer>

</body>
</html>