<?php
require('PokemonsManager.php');

$pokemonManager = new PokemonsManager();
$pokemonToDelete = $pokemonManager->get($_GET['id']);
$error = null;

try {
    $pokemonManager->delete($_GET['id']);
} catch (Exception $e) {
    $error = $e->getMessage();
}

header("Location: ./index.php");
