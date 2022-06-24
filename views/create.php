<main class="container">
    <div class="row">
        <div class="col-10 col-lg-8 col-xl-6 my-5 mx-auto">
            <form action="" method="post" class="row g-3 fs-5 fw-bold" enctype="multipart/form-data">
                <div class="col-md-4 mb-3">
                    <label for="number" class="form-label">Numéro</label>
                    <input type="number" class="form-control" id="number" name="number" min=1 max=901 placeholder="Numéro du pokémon" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" minlength="3" maxlength="40" placeholder="Nom du pokémon" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" minlength="40" maxlength="400" rows="10" placeholder="La description du pokémon"></textarea>
                </div>
                <div class="col-6 mb-3">
                    <label for="type1" class="form-label">Type 1</label>
                    <select class="form-select" id="type1" name="type1" required>
                        <option selected disabled value="">...</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-3">
                    <label for="type2" class="form-label">Type 2</label>
                    <select class="form-select" id="type2" name="type2">
                        <option selected value="null">...</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-12 my-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="col-12 text-center mt-3">
                    <button class="btn btn-primary" type="submit">Créer</button>
                    <a href="index.php" class="btn btn-danger" role="button">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</main>