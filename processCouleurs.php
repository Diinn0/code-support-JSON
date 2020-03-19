<?php

if (!empty($_POST['couleur']) && isset($_POST['couleur'])) {

    $responses = explode(" ", $_POST['couleur']);
    $responses = array_unique($responses);
    sort($responses);

    $jsonFile = file_get_contents('couleur.json');
    $couleurs = json_decode($jsonFile, true);

    $couleurs['couleurs']['list'] = array_merge($couleurs['couleurs']['list'], $responses);
    $json = json_encode($couleurs, JSON_PRETTY_PRINT);

    unlink('couleur.json');
    $file = fopen('couleur.json', 'x');
    fwrite($file, $json);
    fclose($file);

    header('Location: index.php');
}