<?php
require_once('controllers/PokemonsManager.php');
$pokemonManager = new PokemonsManager();
require_once('controllers/TypesManager.php');
$typesManager = new TypesManager();
require_once('controllers/ImagesManager.php');
$imagesManager = new ImagesManager();
$pokemons = $pokemonManager->getAll();
$types = $typesManager->getAll();

$title = "Pokedex - Accueil";

include_once './layouts/header.php'
?>

<main class="container">
    <div class="row">
        <?php require_once './views/getAll.php'; ?>
    </div>
    <div class="row">
        <div class="col-6 mt-3 mb-5 mx-auto text-center">
            <a href="create.php" class="btn btn-success fw-bold">Créer un pokemon</a>
        </div>
    </div>
</main>
<?php include_once './layouts/footer.php' ?>