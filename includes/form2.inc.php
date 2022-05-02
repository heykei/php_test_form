<section >
    <div class="card col-md-7 mx-auto my-1 row">
        <form method="post" action="index.php">
            <p class="h1 text-center">Ajouter plus de données</p>
            <div class="form-floating">
                <input type="text" class="form-control" id="user-prenom" name="user-prenom" placeholder="Prenom" required>
                <label for="floatingPassword">Prénom</label>
            </div>
        <br>
            <div class="form-floating">
                <input type="text" class="form-control" id="user-nom" name="user-nom" placeholder="Nom" required>
                <label for="floatingPassword">Nom</label>
            </div>
        <br>
            <div>
            <p>Age (18 à 70 ans)</p>
            <input type="number" min="18" max="70" class="form-control" id="age" name="user-age" placeholder="Renseignez votre âge" required>
            </div>
        <br>
            <div class="input-group">
                <div class="input-group-prentend">
                    <div class="input-group-text">Taille (1,26 à 3m)</div>
                </div>
                <input type="number" min="1.26" max="3" step="0.01" class="form-control" id="taille" name="user-taille" placeholder="1.7" required>
                <div class="input-group-prentend">
                <div class="input-group-text">m</div>
                </div>
            </div>
        <br>
            <div class="col-sm-4 w-100"> 
            <input type="radio" value="femme" class="form-check-input" name="user-sex" required>
            <label class="form-check-label me-3" for="Femme">Femme</label>

            <input type="radio" value="homme" class="form-check-input" name="user-sex" required>
            <label class="form-check-label" for="Homme">Homme</label>
            </div>
            </div>

        </form>
            </div>
            <div class="card col-md-4 mx-auto my-1">
             <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Default checkbox
                </label>
             </div>
            </div>
            <div class="card col-11 mx-auto my-1">

            </div>
        <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button name="register" type="submit" class="btn btn-primary float end" >Enregistrer les données</button>
            </div>
</section>