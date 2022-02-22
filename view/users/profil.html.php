
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-115 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Modif User</h4>
                </div>
            <form  method="POST">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels"> firstName</label><input type="text" class="form-control" placeholder="first name" name="firstname" value="<?php echo $recuper[0]['firstname'] ?>"></div>
                    <div class="col-md-6"><label class="labels">lastname</label><input type="text" class="form-control" name="lastname" value="<?php echo $recuper[0]['lastname'] ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" class="form-control" value="<?php echo $recuper[0]['number'] ?>" name="number"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control"  name="adress"  value="<?php echo $recuper[0]['address'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="email"  value="<?php echo $recuper[0]['email'] ?>"></div>
                    <div class="col-md-12"><label class="labels"></label><input type="hidden" class="form-control" name="id_user"  value="<?php $recuper[0]['id'] ?>"></div>
                    <div class="col-md-12"><label class="labels"> New Password</label><input type="password" class="form-control"  name="password"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>