<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Support - Settings</title>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Lato|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="/homeniscience/admin/vue/style_settings.css">
</head>
<?php require('../header2.php'); ?>
<body>

<div class="CGU">
    <button class="accordion">Modifier les CGU</button>
    <div class="panel">
        <form action="" method="POST">
            <label for="contenu">
            </label>
            <textarea name="contenu" id="contenu" cols="100" rows="30"><?php echo htmlspecialchars($cgu['contenu']); ?></textarea>
            <input type="submit" value="Modifier" name="submitCGU">
        </form>
    </div>
</div>

<div class="CGU">
    <button class="accordion">Exporter / Supprimer des données</button>

    <div class="panel">
        <form action="" method="POST">
            <label for="email">Email</label>
            <input type="email" name="emailDelete">
            <input type="submit" value="Exporter" name="export">
            <input type="submit" value="Supprimer" name="delete">
        </form>
    </div>
</div>


</body>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>

<footer style="position: inherit">
    <?php require('../../page/footer.php') ?>
</footer>
</html>
