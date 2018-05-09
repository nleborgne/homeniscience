<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <title>AjoutDeCapteur</title>
</head>

<body>
<fieldset>
    <legend>Ajoutez un capteur</legend>
    <form method="post" action="">
        <p>
            <label for="add_piece">Dans quelle pièce voulez-vous l'ajouter ?</label><br />
            <select name="piece" id="add_piece">
                <option value="choix">--Choisir--</option>
                <optgroup label="Rez de chaussé">
                    <option value="salon">Salon</option>
                    <option value="cuisine">Cuisine</option>
                    <option value="salle_a_manger">Salle à manger</option>
                    <option value="garage">Garage</option>
                </optgroup>
                <optgroup label="1er étage">
                    <option value="chambre_1">Chambre Enfant</option>
                    <option value="chambre_2">Chambre Enfant</option>
                    <option value="chambre_3">Chambre Parents</option>
                    <option value="chambre_4">Chambre Invité</option>
                    <option value="salle_de_bain">Salle de bain</option>
                </optgroup>
            </select>
        </p>

        <p>
            <label for="add_capteur">Quel type de capteur voulez-vous ajouter ?</label><br />
            <select name="capteur" id="add_capteur">
                <option value="choix">--Choisir--</option>
                <option value="temperature">Température</option>
                <option value="humidité">Humidité</option>
                <option value="luminosité">Luminosité</option>
                <option value="position">Position</option>
                <option value="caméra">Caméra</option>
            </select>
        </p>

        <p>
            <label for="nom_capteur">Nom que vous voulez attribuer au capteur :</label><br />
            <input type="text" name="nom" id="nom_capteur">
        </p>

    </form>
</fieldset>
</body>
</html>

<style media="screen">
* {
    font-family: 'Comfortaa',sans-serif;
    text-decoration: none;
    color:#343434;
}
fieldset
{
    display: block;
    width: 500px;
    border: 2px #00A2E8 solid;
    border-radius: 5px;
}
legend
{
    border: 2px #00A2E8 solid;
    color: #FFFFFF;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    background-color: #00A2E8;
}
form
{
    margin-left: 10px;
}
</style>