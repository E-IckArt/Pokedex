<main class="container">
    <?php
    if ($error) {
        echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>';
        echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>$error</div>
        </div>";
    } ?>
    <div class="row">
        <div class="col-10 col-lg-8 col-xl-6 my-5 mx-auto">
            <form method="post" action="" class="row g-3 fs-5 fw-bold" enctype="multipart/form-data">
                <div class="col-md-4 mb-3">
                    <label for="number" class="form-label">Numéro</label>
                    <input type="number" class="form-control" min=1 max=901 name="number" value="<?= $pokemon->getNumber() ?>" id="number">
                </div>
                <div class="col-md-8 mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" minlength="4" maxlength="40" name="name" value="<?= $pokemon->getName() ?>" id="name">
                </div>
                <div class="col-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="10" placeholder="La description du Pokémon" minlength="20" maxlength="1000"><?= $pokemon->getDescription() ?></textarea>
                </div>
                <div class="col-6 mb-3">
                    <label for="type1" class="form-label">Type 1</label>
                    <select name="type1" id="type1" class="form-select">
                        <option value="">--</option>
                        <?php foreach ($types as $type) : ?>
                            <option <?= $type->getId() === $pokemon->getType1() ? "selected" : "" ?> value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-3">
                    <label for="type2" class="form-label">Type 2</label>
                    <select name="type2" id="type2" class="form-select">
                        <option value="null">--</option>
                        <?php foreach ($types as $type) : ?>
                            <option <?= $type->getId() === $pokemon->getType2() ? "selected" : "" ?> value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-12 my-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">

                    <img class="my-3 w-25 bg-primary rounded-3" src="<?= $imagesManager->get($pokemon->getImage())->getPath() ?>" alt="<?= $pokemon->getName() ?>">
                </div>
                <div class="col-12 text-center mt-3">
                    <input type="submit" class="btn btn-warning my-3" value="Modifer">
                    <a href="index.php" class="btn btn-primary" role="button">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</main>