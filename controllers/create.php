<?php

require("PokemonsManager.php");
require("TypesManager.php");
require("ImagesManager.php");

$pokemonManager = new PokemonsManager();
$typeManager = new TypesManager();
$types = $typeManager->getAll();
$error = null;


if ($_POST) {
    $number = $_POST['number'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $idType1 = $_POST['type1'];
    $idType2 = $_POST["type2"] === "null" ? null : $_POST["type2"];

    // if ($_FILES["image"]["size"] < 200000) {
    //     $imagesManager = new ImagesManager();
    // }
}
