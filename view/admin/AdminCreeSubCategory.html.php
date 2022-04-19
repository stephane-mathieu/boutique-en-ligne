<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-115 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Créer une sous catégorie</h4>
                </div>
            <form   method="POST">
                <div class="row mt-2">
                    <div class="col-md-6" id="error"><?php if (isset($err_title)) { echo $err_title ; } ?></div>
                    <div class="col-md-9"><label class="labels">Catégorie</label>
                        <select name="category">
                            <?php foreach($categories as $category) { 
                                echo "<option value='".$category['id']."'>".$category['category']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="labels">Titre</label><input type="text" class="form-control" placeholder="title" name="title" ></div>
                   
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Sauvegarder</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>