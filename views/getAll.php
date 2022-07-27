<?php
foreach ($pokemons as $pokemon) : ?>
    <?php
    $imagesManager->get($pokemon->getImage());
    // $typesManager->get($pokemon->getType1());
    ?>
    <div class="col m-2">
        <div class="card h-100 mx-auto bg-dark text-info shadow" style="width: 16rem;">
            <img src="<?= $imagesManager
                            ->get($pokemon->getImage())
                            ->getPath() ?>" class="card-img-top w-auto h-25 p-2 mx-auto mt-3 border border-white rounded-3" alt="image de <?= $pokemon->getName() ?>">
            <h5 class="card-title mt-3 text-center">
                #<?= $pokemon->getNumber() ?> - <?= $pokemon->getName() ?></h5>
            <div class="card-body px-4">
                <div class="card-text">
                    <p><?= substr($pokemon->getDescription(), 0, 170) ?> ...</p>
                    <!-- <p>Type 1 : <?= $pokemon->getType1()
                                        // BUGFIX- Renvoyer le nom et pas l'id 
                                        ?> ...</p>
                <p>Type 2 : <?= $pokemon->getType2() // // BUGFIX- Renvoyer le nom et pas l'id
                            ?> ...</p> -->
                </div>
                <div class="d-flex flex-wrap justify-content-evenly">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info mx-auto my-3" data-bs-toggle="modal" data-bs-target="#descriptionModal<?= $pokemon->getName() ?>">
                        Voir la description complète
                    </button>
                    <a href="update.php?id=<?= $pokemon->getId() ?>" class="btn btn-warning">Modifier</a>
                    <a href="delete.php?id=<?= $pokemon->getId() ?>" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Description Modal -->
<?php foreach ($pokemons as $pokemon) : ?>
    <div class="modal fade " id="descriptionModal<?= $pokemon->getName() ?>" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-info">
                    <h5 class="modal-title" id="descriptionModalLabel"><?= $pokemon->getName() ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light mx-auto px-5">
                    <?= $pokemon->getDescription()
                    ?>
                </div>
                <div class="modal-footer bg-dark text-info">
                    <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>