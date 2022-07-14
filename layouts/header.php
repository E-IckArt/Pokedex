<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon pokedex PHP' ?></title>
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100 bg-light" style="background: url(https://www.media.pokekalos.fr/img/jeux/pokemongo/fonds/23.png)
    no-repeat center; background-size: cover;">
    <header class="text-info">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-info" href="index.php">
                    <img src="./assets/img/logo.png" alt="Logo Pokeball" width="30" height="30" class="d-inline-block align-text-top">
                    Pokedex
                </a>
                <button class="navbar-toggler border-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "><img src="./assets//img/navbar_toggle_button.svg" alt=""></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-info" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info" href="#">Types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info" href="create.php">Ajouter un pokémon</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Chercher" aria-label="Barre de recherche">
                        <button class="btn btn-outline-info" type="submit">Chercher</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>