<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HomeNiscience</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue_faq.css"/>
</head>

<body>
<?php require('../header.php'); ?>
<div class="block">
    <div class="conteneur">
        <button class="accordion" type="button" name="button">Foire aux questions</button>
        <div class="text">

            <h2>Comment ajouter un domicile ou une pièce ?</h2>

            <img src="domicile.png" alt="">

            <p>
                La page "Mon Domicile" vous permet d'ajouter un domicile, ajouter / supprimer des pièces, ainsi que
                d'ajouter / supprimer des capteurs. <br>
                Pour ajouter un domicile, allez sur le panneau de gauche, remplissez les informations relatives à votre
                domicile et cliquez sur le bouton "Définir". <br>
                Pour ajouter une pièce, allez sur le panneau de droite, entrez le nom de la pièce et cliquez sur
                "Ajouter".
            </p>

            <h2>Comment ajouter ou supprimer un capteur dans un CeMac ?</h2>

            <img src="equipement.png" alt="">

            <p>
                Sur la page "Mon Domicile", descendez jusqu'à trouver la partie "Équipement".</br>
                Vous pouvez créer un CeMac ou un capteur sur la partie de gauche en entrant le nom du CeMac ou du
                capteur en sélectionnant d'abord sa pièce.</br>
                Vous pouvez simplement supprimer un capteur ou CeMac en utilisant le panneau de droite et sélectionnant
                l'élément à supprimer.
            </p>

            <h2>Comment ajouter ou supprimer une personne de votre domicile ?</h2>
            <img src="utilisateur.png" alt="">
            <p>
                Sur la page "Mon Domicile", descendez jusqu'à trouver la partie "Utilisateurs".</br>
                Ce module permet la gestion des utilisateurs secondaires, ceux qui vont utiliser le site, mais ne
                pourront pas modifier les attributs d’un domicile. On peut ensuite ajouter des droits à un utilisateur
                secondaire, pour qu’il devienne principal. <br>
                Pour ajouter un utilisateur, il faut le rechercher puis le sélectionner ensuite, pareil pour
                l’utilisateur principal. <br>
                On peut supprimer un utilisateur secondaire ou principal de la même manière dont on peut supprimer un
                domicile ou capteur.
            </p>

            <h2>Comment devenir gestionnaire ?</h2>

            <p>Pour accéder à la page résidence, il faut avoir le statut « gestionnaire », si vous ne l’avez pas, il faut remplir un formulaire avec les informations requises pour créer un statut « gestionnaire ».</p>

            <img src="gestionnaire.png" alt="">
            <p></p>
            <img src="gestionnaire2.png" alt="">

            <p>Après avoir rempli ce formulaire, vous serez redirigé vers la page « gestionnaire » où vous pourrez gérer vos domiciles.</p>

            <h2>Comment ajouter et supprimer des locataires ?</h2>
            <img src="gestionnaire3.png" alt="">
            <p>
                Sur ce module, vous pouvez sélectionner un domicile, puis suivre certaines statistiques de capteurs.<br>
                Grâce à ça, vous pourrez avoir certaines informations sur votre consommation, etc.<br>
                Pour sélectionner un domicile, il faut cliquer sur une case correspondant à un domicile en bas,
                si vous sélectionnez votre domicile dans le menu déroulant, le domicile cherché va être trouvé en bas de page automatiquement.<br>
            </p>

            <h2>Comment ajouter ou supprimer une personne de votre domicile ?</h2>
            <p>
                Le gestionnaire a la possibilité d’ajouter et de supprimer des utilisateurs dans ses domiciles.<br>
                Après avoir sélectionné un domicile comme vu avant, on peut entrer une adresse email qui étant unique va être liée à un utilisateur.<br>
                Cet utilisateur sera ainsi ajouté dans la liste des habitants du domicile choisi.<br>

            </p>
            <img src="gestionnaire4.png" alt="">

            <h2>Comment avoir une vue globale de son domicile ?</h2>
            <p>
                Lorsque vous vous connectez au site à l’aide de vos identifiants, vous accédez à la page suivante :<br>
                Sur cette page, vous trouverez un panel général pour avoir des informations sur son ou ses domiciles,
                on y trouve un historique, une messagerie, ou encore un aperçu des statistiques, telles qu’on peut les trouver dans la partie gestionnaire, mais simplifiée.<br>
                On remarque aussi le header et footer du site web, qui permettront de naviguer dans le site et d’avoir des informations supplémentaires sur Homeniscience et l’équipe Hexateam.<br>
                Dans le module de liste « domicile », on voit tous les capteurs, de toutes les pièces et on recherche les pièces pour voir tous les capteurs d’une pièce.
                On pourra ainsi modifier les caractéristiques du capteur, par exemple, pour un capteur de luminiosité, on peut modifier la luminiosité.<br>
            </p>
            <img src="accueil1.PNG" alt="">
            <p>
                Dans le module général, on peut envoyer des messages qui vont s’afficher pour tous les domiciles,
                une sorte de chat entre utilisateur d’un même domicile.<br>
            </p>
            <img src="accueil2.PNG" alt="">

            <h2>Comment agir en cas de problème de votre système ?</h2>
            <p>
                Sur la page support, vous aurez accès à deux fonctionnalités pour communiquer avec Domisep, pour poser des questions par exemple.<br>
                Si vous appuyez sur « foire aux question », vous serez redirigés vers une page où sont présentes les questions les plus fréquentes (FAQ).<br>
                Si vous appuyez sur « Contacter Domisep », vous serez redirigés vers votre application de mail, afin d’envoyer un mail à Domisep, à l’adresse du support.<br>
                Une fois que vous êtes en connaissance d’une panne, vous pouvez la déclarer à Domisep, grâce au module « ajouter une panne »,
                en renseignant le nom du capteur ciblé et une description du problème.<br>
            </p>
            <img src="support1.PNG" alt="">

            <h2>Comment suivre l’avancement d’une panne ?</h2>
            <p>
                Une fois une panne renseignée, vous pouvez suivre l’avancement de l’opération avec le module « Mes pannes ».
            </p>
            <img src="support2.PNG" alt="">
            <p>
                Ces pannes seront gérées par Domisep et automatiquement marquées comme traitées une fois que le problème est résolu. <br>
                En tant qu’utilisateur, vous ne pourrez que voir l’avancement de la réparation, vous n’aurez aucun contrôle sur cela.<br>
            </p>

            <h2>Comment modifier les informations données à l’inscription ?</h2>
            <p>
                Dans cette partie du site, vous allez être capables de modifier les informations rentrées à l’inscription, au cas où vous vous seriez trompé.
                Cela contient le nom, prénom, adresse mail et mot de passe.<br>
            </p>
            <img src="gestion1.PNG" alt="">
        </div>
    </div>
</div>
<footer style="position: inherit">
    <?php require ('../footer.php')?>
</footer>
</body>
</html>