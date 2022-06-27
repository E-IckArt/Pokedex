<?php
foreach ($pokemons as $pokemon) : ?>
    <div class="card mt-5 mx-auto bg-dark text-info shadow" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="image de <?= $pokemon->getName() ?>">
        <div class="card-body px-4">
            <h5 class="card-title">
                <?= $pokemon->getNumber()  // BUGFIX- Revoir le code car l'appel ne fonctionne pas : Number = NULL
                ?># <?= $pokemon->getName() ?></h5>
            <div class="card-text">
                <p><?= substr($pokemon->getDescription(), 0, 210) ?> ...</p>
                <p><?= $pokemon->getType1() // BUGFIX- Renvoyer le nom et pas l'id 
                    ?> ...</p>
                <p><?= $pokemon->getType2() // // BUGFIX- Renvoyer le nom et pas l'id
                    ?> ...</p>
            </div>
            <div class="d-flex flex-wrap justify-content-evenly">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info mx-auto my-3" data-bs-toggle="modal" data-bs-target="#descriptionModal">
                    Voir la description complète
                </button>
                <a href="#" class="btn btn-warning">Modifier</a>
                <a href="#" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
        <!-- Description Modal -->
        <div class="modal fade " id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="descriptionModalLabel"><?= $pokemon->getName() ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-auto px-5">
                        <?= $pokemon->getDescription() // BUGFIX- Description de bulbizarre sur toutes les modales
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>