<form action="" method="post" class="row g-3" enctype="multipart/form-data">
    <div class="col-md-4 mb-3">
        <label for="number" class="form-label">Numéro</label>
        <input type="number" class="form-control" id="number" name="number" min=1 max=901 placeholder="Numéro du pokémon" required>
    </div>
    <div class="col-md-8 mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" minlength="3" maxlength="40" placeholder="Nom du pokémon" required>
    </div>
    <div class="col-12 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" minlength="40" maxlength="400" rows="10" placeholder="La description du pokémon"></textarea>
    </div>
    <div class="col-6 mb-3">
        <label for="validationDefault04" class="form-label">Type 1</label>
        <select class="form-select" id="validationDefault04" name="type1" required>
            <option selected disabled value="">Choisir le type 1</option>
            <option>Herbe</option>
            <option>Poison</option>
            <option>Electrique</option>
            <option>Feu</option>
            <option>Air</option>
            <option>Normal</option>
            <option>Glace</option>
            <option>Autre type</option>
        </select>
    </div>
    <div class="col-6 mb-3">
        <label for="validationDefault04" class="form-label">Type 2</label>
        <select class="form-select" id="validationDefault04" name="type2">
            <option selected disabled value="">Choisir le type 2</option>
            <option>Herbe</option>
            <option>Poison</option>
            <option>Electrique</option>
            <option>Feu</option>
            <option>Air</option>
            <option>Normal</option>
            <option>Glace</option>
            <option>Autre type</option>
        </select>
    </div>
    <div class="col-12 my-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image">
    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary" type="submit">Créer</button>
        <a href="index.php" class="btn btn-danger" role="button">Annuler</a>
    </div>
</form>