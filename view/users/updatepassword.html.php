<style>
    @media screen and (max-width: 600px) {
        .label {
            max-width: 30px;
        }
    }
</style>


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-115 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold">Modifier votre mot de passe</h4>
                </div>

                <?php if (isset($message)) { echo $message ;}?>



                <?php if ($form ==1 ) {?>

                <h6 class="fw-normal mb-3 pb-3">Le mot de passe doit contenir au moins 10 caractères avec au moins une majuscule, une minuscule, 1 chiffre et un caractère spécial.</h5>

                <form  method="POST">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="label label-default">Mot de passe actuel</label><input type="password" class="form-control" placeholder="**********" name="actual_password"></div>
                        <div class="error"><?php if (isset($error_actual)) { echo $error_actual ; }?></div>

                        <div class="col-md-12"><label class="label label-default mt-3">Nouveau mot de passe</label><input type="password" class="form-control"  name="new_password"  placeholder="********** "></div>
                        <div class="error"><?php if (isset($error_new)) { echo $error_new ; }?></div>

                        <div class="col-md-12"><label class="label label-default mt-3">Confirmez votre nouveau mot de passe</label><input type="password"class="form-control"  name="confirm_new_password" placeholder="**********"></div>
                        <div class="error"><?php if (isset($error_confirm)) { echo $error_confirm ; }?></div>

                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-dark profile-button" type="submit" name="submit">Sauvegarder</button></div>
                </form>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>