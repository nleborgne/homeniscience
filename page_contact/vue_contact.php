<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../page_contact/vue_contact.css"/>
    <title>Contact</title>
</head>

<body>
<div id="conteneur">
<section class="description"> <!-- texte d'introduction de la page -->
    <h1>
    Bienvenue sur cette page Contact.
    </h1>
    <p>
        Bonjour <!-- salutation-->
        <?php echo htmlspecialchars($_SESSION["prenom"]) . ' ' . htmlspecialchars($_SESSION["nom"]) . ',' ?>
    </br>
        Cette page est faite pour vous laissez vous exprimer et nous envoyer des mails.<br/>
        N'hésitez pas à nous poser <strong>toutes vos questions</strong> et l'un de nos collaborateurs vous enverra un mail aussi vite que possible !
    </p>
</section>

<section class="formulaire"> <!-- le formulaire de la page -->
    <form enctype="text/plain" method="get" action="mailto:test@test.fr" id="contact">

        <label for="subject">
            Quel est l'objet ?
        </label>
        </br>
        <input type="text" name="subject" id="subject" placeholder="Votre objet" required/> <!--l'objet du mail-->
        </br>

        <label for="message">
            Quelle question souhaitez-vous nous demander ?
        </label>
        <br /> <!-- ci-dessous, le message du mail-->
        <textarea form="contact" name="body" id="message" rows="10" cols="50" required>Votre message
            </textarea>
        <br/>

        <input class="Valider" type="submit" value="Envoyer" /> <!-- envoi du mail -->

        </p>
    </form>
</section>
</div>
</body>
</html>