<?php
require_once('controllers/PokemonsManager.php');
$pokemonManager = new PokemonsManager();
require_once('controllers/TypesManager.php');
$typesManager = new TypesManager();
require_once('controllers/ImagesManager.php');
$imagesManager = new ImagesManager();
$pokemons = $pokemonManager->getAll();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex - Accueil</title>
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100 bg-light" style="background: url(https://www.media.pokekalos.fr/img/jeux/pokemongo/fonds/23.png)
    no-repeat center; background-size: cover;">

    <?php include_once './layouts/header.php' ?>


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
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>