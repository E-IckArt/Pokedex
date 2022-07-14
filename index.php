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
        <!-- <div class="col d-flex flex-wrap mt-5"> -->
        <?php require_once './views/getAll.php'; ?>
        <!-- </div> -->
    </div>
    <div class="row">
        <div class="col-6 my-5 mx-auto text-center">
            <a href="create.php" class="btn btn-success">Créer un pokemon</a>
        </div>
    </div>
</main>
<?php include_once './layouts/footer.php' ?>