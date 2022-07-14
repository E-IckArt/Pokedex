<?php
require('controllers/delete.php');
$pokemonManager = new PokemonsManager();
$pokemons = $pokemonManager->getAll();

$title = "Pokedex - Supprimer un Pokemon";

require_once './layouts/header.php';
require_once 'views/delete.php';
require_once './layouts/footer.php';
