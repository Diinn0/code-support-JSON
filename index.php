<?php

$jsonFile = file_get_contents('couleur.json');
$couleurs = json_decode($jsonFile); // Objet
//$couleurs_array = json_decode($jsonFile, true); // Tableau

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h3><?= $couleurs->couleurs->comment ?></h3>
    <div class="row">
        <?php
            sort($couleurs->couleurs->list);
            foreach ($couleurs->couleurs->list as $couleur) { ?>
            <span class="btn btn-secondary text-center" style="margin: 5px;">
                <?= $couleur ?>
            </span>
        <?php } ?>
    </div>
    <div class="row">
        <form action="processCouleurs.php" method="post">
            <div class="form-group">
                <label for="couleur" class="font-weight-bold" style="color: magenta;">Ajouter un ou plusieurs termes séparés par un espace</label>
                <input type="text" class="form-control" name="couleur" required>
            </div>
            <button type="submit" id="couleur" class="btn btn-danger">Appliquer</button>
        </form>
    </div>
    <br>
    <h3><?= $couleurs->objets->comment ?></h3>
    <div class="row">
        <?php
            sort($couleurs->objets->list);
            foreach ($couleurs->objets->list as $objet) { ?>
            <span class="btn btn-secondary text-center" style="margin: 5px;">
                <?= $objet ?>
            </span>
        <?php } ?>
    </div>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</html>
