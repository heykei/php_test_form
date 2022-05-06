<h2 class="text-center">Ajouter plus de données</h2>

<div class="container" >
    <div class="row">

        <div name="Prenom" class="card col-md-7 mx-auto my-1">
            <?php include './includes/form.inc.html';?>
        </div>

        <div name="Connaissances" class="card col-md-4 mx-auto my-1">
            <h6>Connaissances</h6>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="HTML5" id="html" name="html">
                <label class="form-check-label" for="flexCheckDefault">
                HTML </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="CSS3" id="css" name="css">
                <label class="form-check-label" for="flexCheckChecked">
                CSS </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="JavaScript" id="javascript" name="js">
                <label class="form-check-label" for="flexCheckChecked">
                JavaScript </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="PHP" id="php" name="php">
                <label class="form-check-label" for="flexCheckChecked">
                PHP </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="MySQL" id="mysql" name="mysql">
                <label class="form-check-label" for="flexCheckChecked">
                MySQL </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Bootstrap" id="bootstrap" name="bootstrap">
                <label class="form-check-label" for="flexCheckChecked">
                Bootstrap </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Symfony" id="symfony" name="symfony">
                <label class="form-check-label" for="flexCheckChecked">
                Symfony </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="React" id="reac" name="genre" name="react">
                <label class="form-check-label" for="flexCheckChecked">
                React </label>
            </div>

            <label for="ColorInput" class="form-label mt-3">Couleur préférée</label>
            <input type="color" id="color" name="color">

            <label for="date" class="form-label mt-3">Date de naissance</label>
            <input type="date" id="date" placeholder="jj/mm/aaaa" name="date">
        </div>

        <div name="JoindreUneImage" class="card col-md-11 mx-auto my-1">
            <h6>Joindre une image (jpg ou png)</h6>
            <input class="form-control" type="file" id=" formFile" name="img">
        </div> 

        <div class="d-flex flex-row-reverse bd-highlight mt-4">
            <button name="enregistrer2" type="submit" class="btn btn-primary">Enregistrer des données</button>
        </div>
    </div> 
</div>   
</form>