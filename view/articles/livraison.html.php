<body>

  <main>
    <section class="livraison">
      <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-3 d-none d-md-block">
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                    <form action="" method="post" enctype="multipart">

                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">Livraison</span>
                      </div>

                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Saisissez vos informations de livraison</h5>
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example17"  name="firstname" value="<?php if(isset($firstname)) { echo $firstname ;}?>" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17">Prénom</label>
                        <div class="form_error"><?php if (isset($err_firstname)) { echo $err_firstname ;} ?></div>
                      </div>
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example17"  name="lastname" value="<?php if(isset($lastname)) { echo $lastname ;}?>" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17">Nom</label>
                        <div class="form_error"><?php if (isset($err_lastname)) { echo $err_lastname ;} ?></div>
                      </div>
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example17"  name="address" value="<?php if(isset($address)) { echo $address ;}?>" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17">Adresse</label>
                        <div class="form_error"><?php if (isset($err_address)) { echo $err_address ;} ?></div>
                      </div>
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example17"  name="zipcode" value="<?php if(isset($zipcode)) { echo $zipcode ;}?>"  class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17">Code Postal </label>
                        <div class="form_error"><?php if (isset($err_zipcode)) { echo $err_zipcode ;} ?></div>
                      </div>
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example17"  name="city" value="<?php if(isset($city)) { echo $city ;}?>"  class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17">Ville</label>
                        <div class="form_error"><?php if (isset($err_city)) { echo $err_city ;} ?></div>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example17"  name="country" value="<?php if(isset($country)) { echo $country ;}?>"  class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17">Pays</label>
                        <div class="form_error"><?php if (isset($err_country)) { echo $err_country ;} ?></div>
                      </div>

                      <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block"  name="submit" type="submit">Valider les informations de livraison</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>