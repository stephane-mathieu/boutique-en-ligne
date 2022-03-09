
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-115 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Ajouter votre commentaire </h4>
                </div>
            <form  method="POST">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels"> Titre</label><input type="text" class="form-control" placeholder="titre" name="titre"></div>
                    <div class="col-md-12"><label class="labels">texte</label><textarea class="form-control"  rows="3" name="texte"></textarea></div>
                </div>
                <div class="row mt-4">
                    <select class="form-select col-md-12 " aria-label="Default select example" name="note" id="droits">
                        <option selected>Notation</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Ajouter le commentaire</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>