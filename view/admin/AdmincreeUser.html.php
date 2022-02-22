<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-115 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Insert User</h4>
                </div>
            <form action="adminInsert" method="POST">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels"> firstName</label><input type="text" class="form-control" placeholder="first name" name="firstname"></div>
                    <div class="col-md-6"><label class="labels">lastname</label><input type="text" class="form-control" name="lastname" placeholder="last name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" class="form-control" placeholder="enter phone number" name="number"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address " name="adress"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter email " name="email"></div>
                    <div class="col-md-12"><label class="labels">password</label><input type="password" class="form-control" placeholder="enter password" name="password"></div>
                </div>
                <div class="row mt-4">
                    <select class="form-select col-md-12 " aria-label="Default select example" name="droits" id="droits">
                        <option selected>Select the role</option>
                        <option value="utilisateur">utilisateur</option>
                        <option value="moderateur">modérateur</option>
                        <option value="administrateur">admin</option>
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