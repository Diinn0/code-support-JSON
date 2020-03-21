<?php

if (!empty($_POST['couleur']) && isset($_POST['couleur'])) {

    $responses = explode(" ", $_POST['couleur']); // On converti la réponse en tableau
    $responses = array_unique($responses); // On supprime les doublons du tableau
    sort($responses); // On trie le tableau par ordre alphabétique

    $jsonFile = file_get_contents('couleur.json'); // On récupère le contenu du fichier couleur.json
    $couleurs = json_decode($jsonFile, true); // On converti le json obtenu en tableau

    $couleurs['couleurs']['list'] = array_merge($couleurs['couleurs']['list'], $responses); // On fusionne le tableau de réponse avec le tableau existant
    $json = json_encode($couleurs, JSON_PRETTY_PRINT); // On encode le tableau fusionné en json en conservant le formattage

    unlink('couleur.json'); // On supprime l'ancien couleur.json
    // On supprime l'ancien fichier car modifier un fichier à un
    // endroit précis demande de savoir sur quel octet précis commencer à ajouter les données.
    $file = fopen('couleur.json', 'x'); // On crée un nouveau couleur.json
    fwrite($file, $json); // On écrit le JSON dans le fichier
    fclose($file); // On ferme le fichier

    header('Location: index.php'); //On redirige sur la page d'accueil
}