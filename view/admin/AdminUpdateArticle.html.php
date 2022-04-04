
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-115 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Modif Article</h4>
                </div>
            <form   method="POST">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels"> title</label><input type="text" class="form-control" placeholder="title" name="title" value="<?php echo $article[0]['title'] ?>"></div>
                    <div class="col-md-6"><label class="labels">brand</label><input type="text" class="form-control" name="brand" value="<?php echo $article[0]['brand'] ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">reference</label><input type="number" class="form-control" value="<?php echo $article[0]['reference'] ?>" name="reference"></div>
                    <div class="col-md-12"><label class="labels">description</label><textarea class="form-control"  rows="3" name="description"  value="<?php echo $article[0]['description'] ?>"> <?php echo $article[0]['description'] ?></textarea></div>
                    <div class="col-md-12"><label class="labels">material</label><input type="text" class="form-control" name="material"  value="<?php echo $article[0]['material'] ?>"></div>
                    <div class="col-md-12"><label class="labels"></label><input type="hidden" class="form-control" name="id_article"  value="<?php $article[0]['id'] ?>"></div>
                    <div class="col-md-12"><label class="labels">colors</label><input type="text" class="form-control" value="<?php echo $article[0]['colors'] ?>" name="colors"></div>
                    <div class="col-md-12"><label class="labels">tips</label><textarea class="form-control"  rows="3" name="tips"> <?php echo $article[0]['tips'] ?></textarea></div>
                    <div class="col-md-12"><label class="labels">packaging</label><input type="text" class="form-control" value="<?php echo $article[0]['packaging'] ?>" name="packaging"></div>
                    <div class="col-md-12"><label class="labels">specificities</label><textarea class="form-control"  rows="3" name="specificities"> <?php echo $article[0]['specificities'] ?></textarea></div>
                    <div class="col-md-12"><label class="labels">dimensions</label><input type="text" class="form-control" value="<?php echo $article[0]['dimensions'] ?>" name="dimensions"></div>
                    <div class="col-md-12"><label class="labels">stock</label><input type="number" class="form-control" value="<?php echo $article[0]['stock'] ?>" name="stock"></div>
                    <div class="col-md-12"><label class="labels">price</label><input type="number" class="form-control" value="<?php echo $article[0]['price'] ?>" name="price" step="0.1"></div>
                    <div class="col-md-12"><label class="labels">discount</label><input type="number" class="form-control" value="<?php echo $article[0]['discount'] ?>" name="discount"></div>
                </div>
                <div class="row mt-4">
                    <select class="form-select col-md-12 " aria-label="Default select example" name="discount_available">
                        <option selected>discount_available</option>
                        <option value= "1" >yes</option>
                        <option value= "2" >no</option>
                    </select>
                </div>
                <div class="row mt-4">
                    <select class="form-select col-md-12 " aria-label="Default select example" name="category">
                        <option selected>category</option>
                        <?php foreach ($category as $categorie) {
                            $id_categorie = (int) $categorie['id']  ?>
                        <option value="<?php echo $id_categorie ?> "><?php echo $categorie['category']; ?> </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="row mt-4">
                    <select class="form-select col-md-12 " aria-label="Default select example" name="sub_category">
                        <option selected>sub_category</option>
                        <?php foreach ($sub_categories as $sous_categorie) { ?>
                        <option value="<?php echo $sous_categorie['id']; ?> "><?php echo $sous_categorie['sub_category']; ?> </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>