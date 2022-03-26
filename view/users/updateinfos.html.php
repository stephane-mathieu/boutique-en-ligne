<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-115 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Modifier les informations</h4>
                </div>
                <form  method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Prénom</label><input type="text" class="form-control" name="firstname" placeholder="<?php echo $infos[0]['firstname'] ;?> "></div>
                        <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" name="lastname" placeholder="<?php echo $infos[0]['lastname'] ;?> "></div>
                    </div>
                    
                    <div class="row mt-2">
                        <div class="error"><?php if (isset($error_firstname)) { echo $error_firstname ; }?></div>
                        <div class="error"><?php if (isset($error_lastname)) { echo $error_lastname ; }?></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile</label><input type="text" minlength="10"class="form-control" placeholder="<?php echo $infos[0]['number'] ;?> " name="number"></div>
                        <div class="error"><?php if (isset($error_number)) { echo $error_number ; }?></div>

                        <div class="col-md-12"><label class="labels">Adresse</label><input type="text" class="form-control"  name="address"  placeholder="<?php echo $infos[0]['address'] ;?> "></div>
                        <div class="error"><?php if (isset($error_address)) { echo $error_address ; }?></div>

                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="email"  placeholder="<?php echo $infos[0]['email'] ;?> "></div>
                        <div class="error"><?php if (isset($error_email)) { echo $error_email ; }?></div>

                        <div class="col-md-12"><label class="labels">Confirmez avec votre mot de passe</label><input type="password" class="form-control"  name="password"></div>
                        <div class="error"><?php if (isset($error_password_confirm)) { echo $error_password_confirm; }?></div>

                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Sauvegarder</button></div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>