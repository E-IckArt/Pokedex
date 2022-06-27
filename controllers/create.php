<?php

require('PokemonsManager.php');
require('TypesManager.php');
require('ImagesManager.php');

$pokemonManager = new PokemonsManager();
$typeManager = new TypesManager();
$types = $typeManager->getAll();
$error = null;

try {
    // Vérification du formulaire soumis
    if (!isset($_POST['number']) || !isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['type1'])) {
        echo 'Il manque des données pour soumettre le formulaire';
        return;
    }

    if ($_POST) {
        $number = $_POST['number'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $idType1 = $_POST['type1'];
        $idType2 = $_POST['type2'] === 'null' ? null : $_POST['type2'];
    }
    if (isset($_FILES['image']) && $_FILES['image']['size'] < 2000000 && $_FILES['image']['error'] === 0) {
        $imagesManager = new ImagesManager();
        $fileName = $_FILES['image']['name'];
        if (!is_dir('uploads/')) { // Création du dossier uploads s'il n'existe pas
            mkdir(('uploads/'));
        }
        $targetFile = 'uploads/{$fileName}';
        $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            // On peut valider le fichier et le stocker définitivement
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagesManager = new ImagesManager();
                $image = new Image(['name' => $fileName, 'path' => $targetFile]);
                $imagesManager->create($image);
                echo 'L\'envoi a bien été effectué !';
            } else {
                throw new Exception('Une erreur est survenue, le fichier n\'as pas pu être chargé.');
            }
        } else {
            throw new Exception('L\'extension du fichier n\'est pas correcte');
        }
    } else {
        throw new Exception('La taille du fichier doit être inférieure à 2 000 000 octets.');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}

$idImage = $imagesManager->getLastImageId();
var_dump($idImage);

$newPokemon = new Pokemon([
    'number' => $number,
    'name' => $name,
    'description' => $description,
    'type1' => $idType1,
    'type2' => $idType2,
    'image' => $idImage,
]);
$pokemonManager->create($newPokemon);
header('Location: index.php');
