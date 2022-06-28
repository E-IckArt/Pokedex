<?php

require('PokemonsManager.php');
require('TypesManager.php');
require('ImagesManager.php');

$pokemonManager = new PokemonsManager();
$typeManager = new TypesManager();
$imagesManager = new ImagesManager();

$pokemon = $pokemonManager->get($_GET['id']);
$types = $typeManager->getAll();
$error = null;

try {
    if ($_POST) {
        $id = $_GET["id"];
        $number = $_POST["number"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $idType1 = $_POST["type1"];
        $idType2 = $_POST["type2"] === "null" ? null : $_POST["type2"];

        if ($number < 1 || $number > 1000 || strlen($name) < 4 || strlen($name) > 40 || strlen($description) < 10 || strlen($description) > 2000 || $idType1 < 1 || $idType1 > 25) {
            throw new Exception("Les données saisies ne sont pas correctes...");
        } else {
            try {
                if ($_FILES["image"]["size"] < 2000000) {
                    $fileName = $_FILES["image"]["name"];
                    if (!is_dir("uploads/")) {
                        mkdir("uploads/");
                    }
                    $targetFile = "uploads/$fileName";
                    $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

                    if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                            $imagesManager = new ImagesManager();
                            $image = new Image(["name" => $fileName, "path" => $targetFile]);
                            $imagesManager->create($image);
                        } else {
                            throw new Exception("Une erreur est survenue...");
                        }
                    } else {
                        throw new Exception("L'extension du fichier n'est pas correcte.");
                    }
                } else {
                    throw new Exception("Le fichier soumis est trop important");
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }
        $idImage = $imagesManager->getLastImageId(); // BUGFIX- Revoir le code pour charger les images, celui-ci n'est pas adapté.

        $newPokemon = new Pokemon([
            "id" => $_GET['id'],
            "number" => $number,
            "name" => $name,
            "description" => $description,
            "type1" => $idType1,
            "type2" => $idType2,
            "image" => $idImage,
        ]);
        $pokemonManager->update($newPokemon);
        header("Location: index.php");
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
