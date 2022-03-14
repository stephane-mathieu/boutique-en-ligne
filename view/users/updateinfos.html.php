<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-115 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Modifier les informations</h4>
                </div>
                <form  method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Prénom</label><input type="text" class="form-control" name="firstname" value=""></div>
                        <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" name="lastname" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile</label><input type="number" class="form-control" value="" name="number"></div>
                        <div class="col-md-12"><label class="labels">Adresse</label><input type="text" class="form-control"  name="address"  value=""></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="email"  value=""></div>
                        <div class="col-md-12"><label class="labels">Confirmez avec votre mot de passe</label><input type="password" class="form-control"  name="password"></div>
                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>